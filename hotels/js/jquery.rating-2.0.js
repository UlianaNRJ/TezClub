/** Рейтинг заметок в виде звезд jquery.rating.js
 *  http://biznesguide.ru/coding/156.html
 *  Copyright (c) 2011 Шамшур Иван (http://twitter.com/ivanshamshur)
 *  Dual licensed under the MIT and GPL licenses
 */
 
;(function($){
	
	
	$.rating = function(e, o){
		
		this.options = $.extend({
		    fx: 'float',
            image: '/images/stars.png',
			stars: 5,
            minimal: 0,
			titles: ['голос','голоса','голосов'],
            readOnly: false,
			readOnlyUrl: 'http://tezclub.com.ua/login',
			url: '',
            type: 'post',
            loader: '/images/ajax-loader.gif',
			click: function(){},
            callback: function(){}
		}, o || {});
		
		this.el = $(e);
        this.left = 0;
        this.width = 0;
        this.height = 0;
        this._data = {};

        var self = this;
        
        this.el.find(':hidden').each(function(){
            var $this = $(this);
            self._data[$this.attr('name')] = $this.val();
        });
        
        this._data.val = parseFloat(this._data.val) || 0;
        this._data.votes = parseFloat(this._data.votes) || '';

        
        if(this._data.val > this.options.stars) this._data.val = this.options.stars;
        if(this._data.val < 0) this._data.val = 0;
        
        this.old = this._data.val;

        this.vote_wrap = this.el.find('div.vote-wrap');
        this.vote_block = this.el.find('div.vote-block');
        this.vote_hover = this.el.find('div.vote-hover');
        this.vote_stars = this.el.find('div.vote-stars');
        this.vote_active = this.el.find('div.vote-active');
        this.vote_result = this.el.find('div.vote-result');
        this.vote_result_scope = this.el.find('span.score');
        this.vote_success = this.el.find('div.vote-success');

        this.loader = $('<img src="'+this.options.loader+'" alt="load...">');

        this.vote_success.html(this.loader);

        //Загружаем изображение звезд и высчитываем ширину и высоту одной звезды
        var img = new Image();
        img.src = this.options.image;
        img.onload = function() {
            self.width = this.width; //Ширина одной звезды
            self.height = this.height/3; //Высота одной звезды
            self.init();
        };
		
	};

	var $r = $.rating;

	$r.fn = $r.prototype = {
		rating: '2.1'
    };
	
	$r.fn.extend = $r.extend = $.extend;

    $r.fn.extend({

    	init: function(){

    		this.render();

    		var self = this, left = 0, width = 0;

            if(this.options.readOnly) {
                this.vote_hover.bind('click.rating',function(){
                    window.location = self.options.readOnlyUrl;
                });
                return;
            }


    		this.vote_hover.bind('mousemove mouseover',function(e){

    			if(self.options.readOnly) return;

    			var $this = $(this),
    		    	score = 0;
                    
                left = e.clientX>0 ? e.clientX: e.pageX;
                width = left - $this.offset().left - 2;
                 
                var max = self.width*self.options.stars,
                    min = self.options.minimal*self.width;

                if(width > max) width = max;
                if(width < min) width = min;   
           
                score = Math.round( width/self.width * 10 ) / 10; //округляем до 1 знака после запятой
           
                if(self.options.fx == 'half'){
                    width = Math.ceil(width/self.width*2)*self.width/2;          
                }
                else if(self.options.fx != 'float'){                    
                    width = Math.ceil(width/self.width) * self.width;  
                }
                
                score = Math.round( width/self.width * 10 ) / 10; 

                self.vote_active.css({
    				'width':width,
    				'background-position':'left bottom'
    			});
                
                self.vote_success.html('Ваша оценка: '+score);
    		    
    		 })
    		 .bind('mouseout',function(){
    			if(self.options.readOnly) return; 
    			self.reset();
                self.vote_success.empty();
    		 })
             .bind('click.rating',function(){
    		
    			if(self.options.readOnly) return;
          
                 var score = Math.round( width/self.width * 10 ) / 10; 

                 if(score > self.options.stars) score = self.options.stars;
                 if(score < 0) score = 0;
                 
                 self.old = self._data.val;
    			 self._data.val = (self._data.val*self._data.votes +score)/(self._data.votes + 1);
                 self._data.val = Math.round( self._data.val * 100 ) / 100;
                 self._data.score = score;
                 self.vote_success.html('Ваша оценка: '+score);
    			 
                 if(self.options.url != ''){
    				 
    				 self.send();
    			 }
                 
                 self.options.readOnly = true;        
    			 self.options.click.apply(this,[score]);
    		 });
    		
    	},
        set: function(){
    		this.vote_active.css({
    			'width':this._data.val*this.width,
    			'background-position':'left bottom'
    		});
    	},
    	reset: function(){
    		this.vote_active.css({
    			'width':this.old*this.width,
    			'background-position':'left bottom'
    		});
    	},
        setvoters: function(){
            this.vote_result.html('(' + this.declOfNum(this._data.votes) + ')');  
            this.vote_result_scope.html(this._data.val);  
        },
    	render: function(){

			this.vote_hover.css({
			    padding:'0 4px',
                height:this.height,
                width:this.width*this.options.stars
            });
			this.vote_result.text('(' + this.declOfNum(this._data.votes) + ')');
			this.vote_stars.css({
			    height:this.height,
                width:this.width*this.options.stars,
                background:"url('"+this.options.image+"') left top"
            });
			this.vote_active.css({
			    height:this.height,
                width:this._data.val*this.width,
                background:"url('"+this.options.image+"') left bottom"
            });
            

            if(this.options.readOnly) {
                this.vote_success.html('Для того, чтоб голосовать, Вам необходимо авторизироваться.');
            } else {
                this.vote_success.html('');
            }


    	},
    	send: function(score){
    		
    		var self = this;
            this.vote_result.html(this.loader);
            
            this._data.votes++;
            
    		$.ajax({
    			url: self.options.url,
    			type: self.options.type,
    			data: this._data,
                dataType: 'json',
    			success: function(data){
		            if(data.status == 'OK') {
		              self.set();
		            }  
                    else{
                        self._data.votes--;
                        self.reset();
                    }
                    
                    self.setvoters();
                       
    				if(data.msg)self.vote_success.html(data.msg);
                    
                    if(typeof self.options.callback == 'function'){
                        
                        self.options.callback.apply(self,[data]);
                    }
    			}
    		});
    		
    	},
    	declOfNum: function(number){  
    	    if(number <= 0) return '';
    		number = Math.abs(Math.floor(number));
            cases = [2, 0, 1, 1, 1, 2];  
            return number+' '+ this.options.titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];  
        }  
    });
    
    
    $.fn.rating = function(o){
    	
    	if (typeof o == 'string') {
            var instance = $(this).data('rating'), args = Array.prototype.slice.call(arguments, 1);
            return instance[o].apply(instance, args);
        } else {
            return this.each(function() {
                var instance = $(this).data('rating');
                if (instance) {
                    if (o) {
                        $.extend(instance.options, o);
                    }
                    
                    instance.init();
                    
                } else {
                	
                    $(this).data('rating', new $r(this, o));
                }
            });
        }
    }; 
	
})(jQuery);