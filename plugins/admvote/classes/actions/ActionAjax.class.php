<?php

class PluginAdmvote_ActionAjax extends PluginAdmvote_Inherit_ActionAjax
{

    public function Init()
    {
	parent::Init();
    }

    protected function RegisterEvent()
    {
	parent::RegisterEvent();
    }

    /**
     * Голосование за комментарий
     *
     */
    protected function EventVoteComment()
    {
	if (!$this->oUserCurrent) {
	    $this->Message_AddErrorSingle($this->Lang_Get('need_authorization'), $this->Lang_Get('error'));
	    return;
	}

	if (!($oComment = $this->Comment_GetCommentById(getRequest('idComment', null, 'post')))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error_noexists'), $this->Lang_Get('error'));
	    return;
	}

	if (!$this->oUserCurrent->isAdministrator()) {
	    if ($oComment->getUserId() == $this->oUserCurrent->getId()) {
		$this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error_self'), $this->Lang_Get('attention'));
		return;
	    }

	    if ($oTopicCommentVote = $this->Vote_GetVote($oComment->getId(), 'comment', $this->oUserCurrent->getId())) {
		$this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error_already'), $this->Lang_Get('attention'));
		return;
	    }
	} else {
	    $bVoteExist = false;
	    if (!($oTopicCommentVote = $this->Vote_GetVote($oComment->getId(), 'comment', $this->oUserCurrent->getId()))) {
		$bVoteExist = true;
	    }
	}

	if (strtotime($oComment->getDate()) <= time() - Config::Get('acl.vote.comment.limit_time')) {
	    $this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error_time'), $this->Lang_Get('attention'));
	    return;
	}

	if (!$this->ACL_CanVoteComment($this->oUserCurrent, $oComment)) {
	    $this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error_acl'), $this->Lang_Get('attention'));
	    return;
	}

	$iValue = getRequest('value', null, 'post');
	if (!in_array($iValue, array('1', '-1'))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error_value'), $this->Lang_Get('attention'));
	    return;
	}

	$oTopicCommentVote = Engine::GetEntity('Vote');
	$oTopicCommentVote->setTargetId($oComment->getId());
	$oTopicCommentVote->setTargetType('comment');
	$oTopicCommentVote->setVoterId($this->oUserCurrent->getId());
	$oTopicCommentVote->setDirection($iValue);
	$oTopicCommentVote->setDate(date("Y-m-d H:i:s"));
	$iVal = (float) $this->Rating_VoteComment($this->oUserCurrent, $oComment, $iValue);
	$oTopicCommentVote->setValue($iVal);

	$oComment->setCountVote($oComment->getCountVote() + 1);
	if ($this->oUserCurrent->isAdministrator()) {
	    if ($this->Comment_UpdateComment($oComment)) {
		if ($bVoteExist) {
		    $this->Vote_AddVote($oTopicCommentVote);
		}
		$this->Message_AddNoticeSingle($this->Lang_Get('comment_vote_ok'), $this->Lang_Get('attention'));
		$this->Viewer_AssignAjax('iRating', $oComment->getRating());
	    } else {
		$this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error'), $this->Lang_Get('error'));
	    }
	} else {
	    if ($this->Vote_AddVote($oTopicCommentVote) and $this->Comment_UpdateComment($oComment)) {
		$this->Message_AddNoticeSingle($this->Lang_Get('comment_vote_ok'), $this->Lang_Get('attention'));
		$this->Viewer_AssignAjax('iRating', $oComment->getRating());
		/**
		 * Добавляем событие в ленту
		 */
		$this->Stream_write($oTopicCommentVote->getVoterId(), 'vote_comment', $oComment->getId());
	    } else {
		$this->Message_AddErrorSingle($this->Lang_Get('comment_vote_error'), $this->Lang_Get('error'));
		return;
	    }
	}
    }

    /**
     * Голосование за топик
     *
     */
    protected function EventVoteTopic()
    {
	if (!$this->oUserCurrent) {
	    $this->Message_AddErrorSingle($this->Lang_Get('need_authorization'), $this->Lang_Get('error'));
	    return;
	}

	if (!($oTopic = $this->Topic_GetTopicById(getRequest('idTopic', null, 'post')))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
	    return;
	}
	if (!$this->oUserCurrent->isAdministrator()) {
	    if ($oTopic->getUserId() == $this->oUserCurrent->getId()) {
		$this->Message_AddErrorSingle($this->Lang_Get('topic_vote_error_self'), $this->Lang_Get('attention'));
		return;
	    }

	    if ($oTopicVote = $this->Vote_GetVote($oTopic->getId(), 'topic', $this->oUserCurrent->getId())) {
		$this->Message_AddErrorSingle($this->Lang_Get('topic_vote_error_already'), $this->Lang_Get('attention'));
		return;
	    }
	} else {
	    $bVoteExist = false;
	    if (!($oTopicVote = $this->Vote_GetVote($oTopic->getId(), 'topic', $this->oUserCurrent->getId()))) {
		$bVoteExist = true;
	    }
	}
	if (strtotime($oTopic->getDateAdd()) <= time() - Config::Get('acl.vote.topic.limit_time')) {
	    $this->Message_AddErrorSingle($this->Lang_Get('topic_vote_error_time'), $this->Lang_Get('attention'));
	    return;
	}

	$iValue = getRequest('value', null, 'post');
	if (!in_array($iValue, array('1', '-1', '0'))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('attention'));
	    return;
	}

	if (!$this->ACL_CanVoteTopic($this->oUserCurrent, $oTopic) and $iValue) {
	    $this->Message_AddErrorSingle($this->Lang_Get('topic_vote_error_acl'), $this->Lang_Get('attention'));
	    return;
	}

	$oTopicVote = Engine::GetEntity('Vote');
	$oTopicVote->setTargetId($oTopic->getId());
	$oTopicVote->setTargetType('topic');
	$oTopicVote->setVoterId($this->oUserCurrent->getId());
	$oTopicVote->setDirection($iValue);
	$oTopicVote->setDate(date("Y-m-d H:i:s"));
	$iVal = 0;
	if ($iValue != 0) {
	    $iVal = (float) $this->Rating_VoteTopic($this->oUserCurrent, $oTopic, $iValue);
	}
	$oTopicVote->setValue($iVal);
	$oTopic->setCountVote($oTopic->getCountVote() + 1);
	if ($this->oUserCurrent->isAdministrator()) {
	    if ($this->Topic_UpdateTopic($oTopic)) {
		if ($bVoteExist) {
		    $this->Vote_AddVote($oTopicVote);
		}
		$sMsg = $iValue == 0 ? $this->Lang_Get('topic_vote_ok_abstain') : $this->Lang_Get('topic_vote_ok');
		$this->Message_AddNoticeSingle($sMsg, $this->Lang_Get('attention'));
		$this->Viewer_AssignAjax('iRating', $oTopic->getRating());
	    } else {
		$this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
	    }
	} else {
	    if ($this->Vote_AddVote($oTopicVote) and $this->Topic_UpdateTopic($oTopic)) {
		if ($iValue) {
		    $this->Message_AddNoticeSingle($this->Lang_Get('topic_vote_ok'), $this->Lang_Get('attention'));
		} else {
		    $this->Message_AddNoticeSingle($this->Lang_Get('topic_vote_ok_abstain'), $this->Lang_Get('attention'));
		}
		$this->Viewer_AssignAjax('iRating', $oTopic->getRating());
		/**
		 * Добавляем событие в ленту
		 */
		$this->Stream_write($oTopicVote->getVoterId(), 'vote_topic', $oTopic->getId());
	    } else {
		$this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
		return;
	    }
	}
    }

    /**
     * Голосование за блог
     *
     */
    protected function EventVoteBlog()
    {
	if (!$this->oUserCurrent) {
	    $this->Message_AddErrorSingle($this->Lang_Get('need_authorization'), $this->Lang_Get('error'));
	    return;
	}

	if (!($oBlog = $this->Blog_GetBlogById(getRequest('idBlog', null, 'post')))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
	    return;
	}
	if (!$this->oUserCurrent->isAdministrator()) {
	    if ($oBlog->getOwnerId() == $this->oUserCurrent->getId()) {
		$this->Message_AddErrorSingle($this->Lang_Get('blog_vote_error_self'), $this->Lang_Get('attention'));
		return;
	    }

	    if ($oBlogVote = $this->Vote_GetVote($oBlog->getId(), 'blog', $this->oUserCurrent->getId())) {
		$this->Message_AddErrorSingle($this->Lang_Get('blog_vote_error_already'), $this->Lang_Get('attention'));
		return;
	    }
	} else {
	    $bVoteExist = false;
	    if (!($oBlogVote = $this->Vote_GetVote($oBlog->getId(), 'blog', $this->oUserCurrent->getId()))) {
		$bVoteExist = true;
	    }
	}
	switch ($this->ACL_CanVoteBlog($this->oUserCurrent, $oBlog)) {
	    case ModuleACL::CAN_VOTE_BLOG_TRUE:
		$iValue = getRequest('value', null, 'post');
		if (in_array($iValue, array('1', '-1'))) {
		    $oBlogVote = Engine::GetEntity('Vote');
		    $oBlogVote->setTargetId($oBlog->getId());
		    $oBlogVote->setTargetType('blog');
		    $oBlogVote->setVoterId($this->oUserCurrent->getId());
		    $oBlogVote->setDirection($iValue);
		    $oBlogVote->setDate(date("Y-m-d H:i:s"));
		    $iVal = (float) $this->Rating_VoteBlog($this->oUserCurrent, $oBlog, $iValue);
		    $oBlogVote->setValue($iVal);
		    $oBlog->setCountVote($oBlog->getCountVote() + 1);
		    if ($this->oUserCurrent->isAdministrator()) {
			if ($this->Blog_UpdateBlog($oBlog)) {
			    if ($bVoteExist) {
				$this->Vote_AddVote($oBlogVote);
			    }
			    $this->Viewer_AssignAjax('iCountVote', $oBlog->getCountVote());
			    $this->Viewer_AssignAjax('iRating', $oBlog->getRating());
			    $this->Message_AddNoticeSingle($this->Lang_Get('blog_vote_ok'), $this->Lang_Get('attention'));
			} else {
			    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('attention'));
			}
		    } else {
			if ($this->Vote_AddVote($oBlogVote) and $this->Blog_UpdateBlog($oBlog)) {
			    $this->Viewer_AssignAjax('iCountVote', $oBlog->getCountVote());
			    $this->Viewer_AssignAjax('iRating', $oBlog->getRating());
			    $this->Message_AddNoticeSingle($this->Lang_Get('blog_vote_ok'), $this->Lang_Get('attention'));
			    /**
			     * Добавляем событие в ленту
			     */
			    $this->Stream_write($oBlogVote->getVoterId(), 'vote_blog', $oBlog->getId());
			} else {
			    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('attention'));
			    return;
			}
		    }
		} else {
		    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('attention'));
		    return;
		}
		break;
	    case ModuleACL::CAN_VOTE_BLOG_ERROR_CLOSE:
		$this->Message_AddErrorSingle($this->Lang_Get('blog_vote_error_close'), $this->Lang_Get('attention'));
		return;
		break;

	    default:
	    case ModuleACL::CAN_VOTE_BLOG_FALSE:
		$this->Message_AddErrorSingle($this->Lang_Get('blog_vote_error_acl'), $this->Lang_Get('attention'));
		return;
		break;
	}
    }

    /**
     * Голосование за блог
     *
     */
    protected function EventVoteUser()
    {
	if (!$this->oUserCurrent) {
	    $this->Message_AddErrorSingle($this->Lang_Get('need_authorization'), $this->Lang_Get('error'));
	    return;
	}

	if (!($oUser = $this->User_GetUserById(getRequest('idUser', null, 'post')))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
	    return;
	}
	if (!$this->oUserCurrent->isAdministrator()) {
	    if ($oUser->getId() == $this->oUserCurrent->getId()) {
		$this->Message_AddErrorSingle($this->Lang_Get('user_vote_error_self'), $this->Lang_Get('attention'));
		return;
	    }

	    if ($oUserVote = $this->Vote_GetVote($oUser->getId(), 'user', $this->oUserCurrent->getId())) {
		$this->Message_AddErrorSingle($this->Lang_Get('user_vote_error_already'), $this->Lang_Get('attention'));
		return;
	    }
	} else {
	    $bVoteExist = false;
	    if (!($oUserVote = $this->Vote_GetVote($oUser->getId(), 'user', $this->oUserCurrent->getId()))) {
		$bVoteExist = true;
	    }
	}
	if (!$this->ACL_CanVoteUser($this->oUserCurrent, $oUser)) {
	    $this->Message_AddErrorSingle($this->Lang_Get('user_vote_error_acl'), $this->Lang_Get('attention'));
	    return;
	}

	$iValue = getRequest('value', null, 'post');
	if (!in_array($iValue, array('1', '-1'))) {
	    $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('attention'));
	    return;
	}


	$oUserVote = Engine::GetEntity('Vote');
	$oUserVote->setTargetId($oUser->getId());
	$oUserVote->setTargetType('user');
	$oUserVote->setVoterId($this->oUserCurrent->getId());
	$oUserVote->setDirection($iValue);
	$oUserVote->setDate(date("Y-m-d H:i:s"));
	$iVal = (float) $this->Rating_VoteUser($this->oUserCurrent, $oUser, $iValue);
	$oUserVote->setValue($iVal);
	//$oUser->setRating($oUser->getRating()+$iValue);
	$oUser->setCountVote($oUser->getCountVote() + 1);
	if ($this->oUserCurrent->isAdministrator()) {
	    if ($this->User_Update($oUser)) {
		if ($bVoteExist) {
		    $this->Vote_AddVote($oUserVote);
		}
		$this->Message_AddNoticeSingle($this->Lang_Get('user_vote_ok'), $this->Lang_Get('attention'));
		$this->Viewer_AssignAjax('iRating', $oUser->getRating());
		$this->Viewer_AssignAjax('iSkill', $oUser->getSkill());
		$this->Viewer_AssignAjax('iCountVote', $oUser->getCountVote());
	    } else {
		$this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
	    }
	} else {
	    if ($this->Vote_AddVote($oUserVote) and $this->User_Update($oUser)) {
		$this->Message_AddNoticeSingle($this->Lang_Get('user_vote_ok'), $this->Lang_Get('attention'));
		$this->Viewer_AssignAjax('iRating', $oUser->getRating());
		$this->Viewer_AssignAjax('iSkill', $oUser->getSkill());
		$this->Viewer_AssignAjax('iCountVote', $oUser->getCountVote());
		/**
		 * Добавляем событие в ленту
		 */
		$this->Stream_write($oUserVote->getVoterId(), 'vote_user', $oUser->getId());
	    } else {
		$this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
		return;
	    }
	}
    }

    /**
     * Shutdown Function
     */
    public function EventShutdown()
    {
	parent::RegisterEvent();
    }

}

?>
