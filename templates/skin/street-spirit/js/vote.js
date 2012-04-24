var ls = ls || {};

/**
* Динамическая подгрузка блоков
*/
ls.vote = (function ($) {
    /**
	* Опции
	*/
    this.options = {
        classes: {
            voted: 		'voted',
            plus: 		'plus',
            minus:  	'minus',
            positive:	'positive',
            negative:  	'negative'
        },
        prefix_area: 'vote_area_',
        prefix_area_res: 'vote_area_res_',
        prefix_area_btn: 'vote_area_btn_',
        prefix_total: 'vote_total_',
        type: {
            comment: {
                url: aRouter['ajax']+'vote/comment/',
                targetName: 'idComment'
            },
            topic: {
                url: aRouter['ajax']+'vote/topic/',
                targetName: 'idTopic'
            },
            blog: {
                url: aRouter['ajax']+'vote/blog/',
                targetName: 'idBlog'
            },
            user: {
                url: aRouter['ajax']+'vote/user/',
                targetName: 'idUser'
            }
        }
    };

    this.vote = function(idTarget, objVote, value, type) {
        if (!this.options.type[type]) return false;

        objVote = $(objVote);
        var params = {};
        params['value'] = value;
        params[this.options.type[type].targetName] = idTarget;

        ls.ajax(this.options.type[type].url, params, function(result) {
            this.onVote(idTarget, objVote, value, type, result);
        }.bind(this));
        return false;
    }

    this.onVote = function(idTarget, objVote, value, type, result) {
        if (result.bStateError) {
            ls.msg.error(null, result.sMsg);
        } else {
            ls.msg.notice(null, result.sMsg);

            var divVoting = $('#'+this.options.prefix_area+type+'_'+idTarget);
            var divTotal = $('#'+this.options.prefix_total+type+'_'+idTarget);

            result.iRating = parseFloat(result.iRating);

            if(divVoting.length){

                divVoting.addClass(this.options.classes.voted);

                if (value > 0) {
                    divVoting.addClass(this.options.classes.plus);
                }
                if (value < 0) {
                    divVoting.addClass(this.options.classes.minus);
                }

                divVoting.removeClass(this.options.classes.negative);
                divVoting.removeClass(this.options.classes.positive);

                if (result.iRating > 0) {
                    divVoting.addClass(this.options.classes.positive);
                    divTotal.text('+'+result.iRating);
                }
                if (result.iRating < 0) {
                    divVoting.addClass(this.options.classes.negative);
                    divTotal.text(result.iRating);
                }

            }else{
                divVoting = $('#'+this.options.prefix_area_btn+type+'_'+idTarget);

                divVoting.remove();

                var divResVoting = $('#'+this.options.prefix_area_res+type+'_'+idTarget);

                var divResVotingSpan = $('.vote-wrap', divResVoting);

                divResVotingSpan.addClass(this.options.classes.voted);

                if (value > 0) {
                    divResVotingSpan.addClass(this.options.classes.plus);
                }
                if (value < 0) {
                    divResVotingSpan.addClass(this.options.classes.minus);
                }

                divResVoting.show();

                divResVotingSpan.removeClass(this.options.classes.negative);
                divResVotingSpan.removeClass(this.options.classes.positive);

                if (result.iRating > 0) {
                    divResVotingSpan.addClass(this.options.classes.positive);
                    divTotal.text('+'+result.iRating);
                }
                if (result.iRating < 0) {
                    divResVotingSpan.addClass(this.options.classes.negative);
                    divTotal.text(result.iRating);
                }

            }

            if (result.iRating == 0) {
                divTotal.text(0);
            }

            var method='onVote'+ls.tools.ucfirst(type);
            if (typeof(this[method])=='function') {
                this[method].apply(this,[idTarget, objVote, value, type, result]);
            }
        }
        $(this).trigger('vote',[idTarget, objVote, value, type, result]);
    }

    this.onVoteUser = function(idTarget, objVote, value, type, result) {
        $('#user_skill_'+idTarget).text(result.iSkill);
    }

    return this;
}).call(ls.vote || {},jQuery);