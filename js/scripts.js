window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){arguments.callee=arguments.callee.caller;var a=[].slice.call(arguments);typeof console.log==="object"?log.apply.call(console.log,console,a):console.log.apply(console,a)}};
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try{console.log();return window.console;}catch(err){return window.console={};}})());

/**
 * Hookshot v1.0
 * jQuery plugin for fragment anchors to scroll smoothly
 * by Arthur Corenzan <arthur@corenzan.com>
 * Creative Commons-Attribution-Share Alike
 * http://creativecommons.org/licenses/by-sa/3.0
 *
 */
(function(a){a.fn.hookshot=function(b){b=a.extend({speed:200},b);return this.each(function(c,d){a(d).click(function(c){c.preventDefault();var d,e;e=this.href.split("#").pop();d=e?a("#"+e).offset().top:0;a("html, body").animate({scrollTop:d},b.speed)})})}})(jQuery);

// jquery.tweet.js - See http://tweet.seaofclouds.com/ or https://github.com/seaofclouds/tweet for more info
// Copyright (c) 2008-2011 Todd Matthews & Steve Purcell
(function(a){a.fn.tweet=function(b){function l(b){var d={};d.item=b;d.source=b.source;d.screen_name=b.from_user||b.user.screen_name;d.avatar_size=c.avatar_size;d.avatar_url=j(b.profile_image_url||b.user.profile_image_url);d.retweet=typeof b.retweeted_status!="undefined";d.tweet_time=g(b.created_at);d.join_text=c.join_text=="auto"?i(b.text):c.join_text;d.tweet_id=b.id_str;d.twitter_base="http://"+c.twitter_url+"/";d.user_url=d.twitter_base+d.screen_name;d.tweet_url=d.user_url+"/status/"+d.tweet_id;d.reply_url=d.twitter_base+"intent/tweet?in_reply_to="+d.tweet_id;d.retweet_url=d.twitter_base+"intent/retweet?tweet_id="+d.tweet_id;d.favorite_url=d.twitter_base+"intent/favorite?tweet_id="+d.tweet_id;d.retweeted_screen_name=d.retweet&&b.retweeted_status.user.screen_name;d.tweet_relative_time=h(d.tweet_time);d.tweet_raw_text=d.retweet?"RT @"+d.retweeted_screen_name+" "+b.retweeted_status.text:b.text;d.tweet_text=a([d.tweet_raw_text]).linkUrl().linkUser().linkHash()[0];d.tweet_text_fancy=a([d.tweet_text]).makeHeart().capAwesome().capEpic()[0];d.user=e('<a class="tweet_user" href="{user_url}">{screen_name}</a>',d);d.join=c.join_text?e(' <span class="tweet_join">{join_text}</span> ',d):" ";d.avatar=d.avatar_size?e('<a class="tweet_avatar" href="{user_url}"><img src="{avatar_url}" height="{avatar_size}" width="{avatar_size}" alt="{screen_name}\'s avatar" title="{screen_name}\'s avatar" border="0"/></a>',d):"";d.time=e('<span class="tweet_time"><a href="{tweet_url}" title="view tweet on twitter">{tweet_relative_time}</a></span>',d);d.text=e('<span class="tweet_text">{tweet_text_fancy}</span>',d);d.reply_action=e('<a class="tweet_action tweet_reply" href="{reply_url}">reply</a>',d);d.retweet_action=e('<a class="tweet_action tweet_retweet" href="{retweet_url}">retweet</a>',d);d.favorite_action=e('<a class="tweet_action tweet_favorite" href="{favorite_url}">favorito</a>',d);return d}function k(){var a="https:"==document.location.protocol?"https:":"http:";var b=c.fetch===null?c.count:c.fetch;if(c.list){return a+"//"+c.twitter_api_url+"/1/"+c.username[0]+"/lists/"+c.list+"/statuses.json?page="+c.page+"&per_page="+b+"&callback=?"}else if(c.favorites){return a+"//"+c.twitter_api_url+"/favorites/"+c.username[0]+".json?page="+c.page+"&count="+b+"&callback=?"}else if(c.query===null&&c.username.length==1){return a+"//"+c.twitter_api_url+"/1/statuses/user_timeline.json?screen_name="+c.username[0]+"&count="+b+(c.retweets?"&include_rts=1":"")+"&page="+c.page+"&callback=?"}else{var d=c.query||"from:"+c.username.join(" OR from:");return a+"//"+c.twitter_search_url+"/search.json?&q="+encodeURIComponent(d)+"&rpp="+b+"&page="+c.page+"&callback=?"}}function j(a){return"https:"==document.location.protocol?a.replace(/^http:/,"https:"):a}function i(a){if(a.match(/^(@([A-Za-z0-9-_]+)) .*/i)){return c.auto_join_text_reply}else if(a.match(d)){return c.auto_join_text_url}else if(a.match(/^((\w+ed)|just) .*/im)){return c.auto_join_text_ed}else if(a.match(/^(\w*ing) .*/i)){return c.auto_join_text_ing}else{return c.auto_join_text_default}}function h(a){var b=arguments.length>1?arguments[1]:new Date;var c=parseInt((b.getTime()-a)/1e3,10);var d="";if(c<60){d=c+" segundos atrás"}else if(c<120){d="um minuto atrás"}else if(c<45*60){d=parseInt(c/60,10).toString()+" minutos atrás"}else if(c<2*60*60){d="há uma hora"}else if(c<24*60*60){d=""+parseInt(c/3600,10).toString()+" horas atrás"}else if(c<48*60*60){d="um dia atrás"}else{d=parseInt(c/86400,10).toString()+" dias atrás"}return"há "+d}function g(a){return Date.parse(a.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i,"$1,$2$4$3"))}function f(b,c){return function(){var d=[];this.each(function(){d.push(this.replace(b,c))});return a(d)}}function e(a,b){if(typeof a==="string"){var c=a;for(var d in b){var e=b[d];c=c.replace(new RegExp("{"+d+"}","g"),e===null?"":e)}return c}else return a(b)}var c=a.extend({username:null,list:null,favorites:false,query:null,avatar_size:null,count:3,fetch:null,page:1,retweets:true,intro_text:null,outro_text:null,join_text:null,auto_join_text_default:"i said,",auto_join_text_ed:"i",auto_join_text_ing:"i am",auto_join_text_reply:"i replied to",auto_join_text_url:"i was looking at",loading_text:null,refresh_interval:null,twitter_url:"twitter.com",twitter_api_url:"api.twitter.com",twitter_search_url:"search.twitter.com",template:"{avatar}{time}{join}{text}",comparator:function(a,b){return b["tweet_time"]-a["tweet_time"]},filter:function(a){return true}},b);var d=/\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/gi;a.extend({tweet:{t:e}});a.fn.extend({linkUrl:f(d,function(a){var b=/^[a-z]+:/i.test(a)?a:"http://"+a;return'<a href="'+b+'">'+a+"</a>"}),linkUser:f(/@(\w+)/gi,'@<a href="http://'+c.twitter_url+'/$1">$1</a>'),linkHash:f(/(?:^| )[\#]+([\w\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff\u0600-\u06ff]+)/gi,' <a href="http://'+c.twitter_search_url+"/search?q=&tag=$1&lang=all"+(c.username&&c.username.length==1?"&from="+c.username.join("%2BOR%2B"):"")+'">#$1</a>'),capAwesome:f(/\b(awesome)\b/gi,'<span class="awesome">$1</span>'),capEpic:f(/\b(epic)\b/gi,'<span class="epic">$1</span>'),makeHeart:f(/(<)+[3]/gi,"<tt class='heart'>&#x2665;</tt>")});return this.each(function(b,d){var f=a('<ul class="tweet_list">').appendTo(d);var g='<p class="tweet_intro">'+c.intro_text+"</p>";var h='<p class="tweet_outro">'+c.outro_text+"</p>";var i=a('<p class="loading">'+c.loading_text+"</p>");if(c.username&&typeof c.username=="string"){c.username=[c.username]}if(c.loading_text)a(d).append(i);a(d).bind("tweet:load",function(){a.getJSON(k(),function(b){if(c.loading_text)i.remove();if(c.intro_text)f.before(g);f.empty();var j=a.map(b.results||b,l);j=a.grep(j,c.filter).sort(c.comparator).slice(0,c.count);f.append(a.map(j,function(a){return"<li>"+e(c.template,a)+"</li>"}).join("")).children("li:first").addClass("tweet_first").end().children("li:odd").addClass("tweet_even").end().children("li:even").addClass("tweet_odd");if(c.outro_text)f.after(h);a(d).trigger("loaded").trigger(j.length===0?"empty":"full");if(c.refresh_interval){window.setTimeout(function(){a(d).trigger("tweet:load")},1e3*c.refresh_interval)}})}).trigger("tweet:load")})}})(jQuery);

/**
 * jQuery HTML5form by http://www.matiasmancini.com.ar/jquery-plugin-ajax-form-validation-html5.html
 */
(function($){$.fn.html5form=function(options){$(this).each(function(){var defaults={async:true,method:$(this).attr('method'),responseDiv:null,labels:'show',colorOn:'#000000',colorOff:'#a1a1a1',action:$(this).attr('action'),messages:false,emptyMessage:false,emailMessage:false,allBrowsers:true};var opts=$.extend({},defaults,options);if(!opts.allBrowsers){if($.browser.webkit&&parseInt($.browser.version)>=533){return false}if($.browser.mozilla&&parseInt($.browser.version)>=2){return false}if($.browser.opera&&parseInt($.browser.version)>=11){return false}}var form=$(this);var required=new Array();var email=new Array();function fillInput(input){if(input.attr('placeholder')&&input.attr('type')!='password'){input.val(input.attr('placeholder'));input.css('color',opts.colorOff)}else{if(!input.data('value')){if(input.val()!=''){input.data('value',input.val())}}else{input.val(input.data('value'))}input.css('color',opts.colorOn)}}if(opts.labels=='hide'){$(this).find('label').hide()}$.each($('select',this),function(){$(this).css('color',opts.colorOff);$(this).change(function(){$(this).css('color',opts.colorOn)})});$.each($(':input:visible:not(:button, :submit, :radio, :checkbox, select)',form),function(i){fillInput($(this));if(this.getAttribute('required')!=null){required[i]=$(this)}if(this.getAttribute('type')=='email'){email[i]=$(this)}$(this).bind('focus',function(ev){ev.preventDefault();if(this.value==$(this).attr('placeholder')){if(this.getAttribute('type')!='url'){$(this).attr('value','')}}$(this).css('color',opts.colorOn)});$(this).bind('blur',function(ev){ev.preventDefault();if(this.value==''){fillInput($(this))}else{if((this.getAttribute('type')=='url')&&($(this).val()==$(this).attr('placeholder'))){fillInput($(this))}}});$('textarea').filter(this).each(function(){if($(this).attr('maxlength')>0){$(this).keypress(function(ev){var cc=ev.charCode||ev.keyCode;if(cc==37||cc==39){return true}if(cc==8||cc==46){return true}if(this.value.length>=$(this).attr('maxlength')){return false}else{return true}})}})});$.each($('input:submit, input:image, input:button',this),function(){$(this).bind('click',function(ev){var emptyInput=null;var emailError=null;var input=$(':input:visible:not(:button, :submit, :radio, :checkbox, select)',form);$(required).each(function(key,value){if(value==undefined){return true}if(($(this).val()==$(this).attr('placeholder'))||($(this).val()=='')){emptyInput=$(this);if(opts.emptyMessage){$(opts.responseDiv).html('<p>'+opts.emptyMessage+'</p>')}else if(opts.messages=='es'){$(opts.responseDiv).html('<p>El campo '+$(this).attr('title')+' es requerido.</p>')}else if(opts.messages=='en'){$(opts.responseDiv).html('<p>The '+$(this).attr('title')+' field is required.</p>')}else if(opts.messages=='it'){$(opts.responseDiv).html('<p>Il campo '+$(this).attr('title')+' &eacute; richiesto.</p>')}else if(opts.messages=='de'){$(opts.responseDiv).html('<p>'+$(this).attr('title')+' ist ein Pflichtfeld.</p>')}else if(opts.messages=='fr'){$(opts.responseDiv).html('<p>Le champ '+$(this).attr('title')+' est requis.</p>')}else if(opts.messages=='nl'||opts.messages=='be'){$(opts.responseDiv).html('<p>'+$(this).attr('title')+' is een verplicht veld.</p>')}else if(opts.messages=='br'){$(opts.responseDiv).html('<p>O campo '+$(this).attr('title')+' &eacute; obrigat&oacute;rio.</p>')}else if(opts.messages=='br'){$(opts.responseDiv).html("<p>Insira um email v&aacute;lido por favor.</p>")}return false}return emptyInput});$(email).each(function(key,value){if(value==undefined){return true}if($(this).val().search(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/i)){emailError=$(this);return false}return emailError});if(!emptyInput&&!emailError){$(input).each(function(){if($(this).val()==$(this).attr('placeholder')){$(this).val('')}});if(opts.async){var formData=$(form).serialize();$.ajax({url:opts.action,type:opts.method,data:formData,success:function(data){if(opts.responseDiv){$(opts.responseDiv).html(data)}$(input).val('');$.each(form[0],function(){fillInput($(this).not(':hidden, :button, :submit, :radio, :checkbox, select'));$('select',form).each(function(){$(this).css('color',opts.colorOff);$(this).children('option:eq(0)').attr('selected','selected')});$(':radio, :checkbox',form).removeAttr('checked')})}})}else{$(form).submit()}}else{if(emptyInput){$(emptyInput).focus().select()}else if(emailError){if(opts.emailMessage){$(opts.responseDiv).html('<p>'+opts.emailMessage+'</p>')}else if(opts.messages=='es'){$(opts.responseDiv).html('<p>Ingrese una direcci&oacute;n de correo v&aacute;lida por favor.</p>')}else if(opts.messages=='en'){$(opts.responseDiv).html('<p>Please type a valid email address.</p>')}else if(opts.messages=='it'){$(opts.responseDiv).html("<p>L'indirizzo e-mail non &eacute; valido.</p>")}else if(opts.messages=='de'){$(opts.responseDiv).html("<p>Bitte eine g&uuml;ltige E-Mail-Adresse eintragen.</p>")}else if(opts.messages=='fr'){$(opts.responseDiv).html("<p>Entrez une adresse email valide s&rsquo;il vous plait.</p>")}else if(opts.messages=='nl'||opts.messages=='be'){$(opts.responseDiv).html('<p>Voert u alstublieft een geldig email adres in.</p>')}$(emailError).select()}else{alert('Unknown Error')}}return false})})})}})(jQuery);

$(function() {
     
     $(".player").jqvideobox({'width': 640, 'height': 390});

	 $("a[href^=#]").hookshot();

      $(".tweet").tweet({
        join_text: false,
        username: "andrewsfg",
        avatar_size: 42,
        count: 4
      });

       $('#contact_form').html5form({
            allBrowsers : true,
            responseDiv : '#response',
            messages: 'br',
            emailMessage : 'O e-mail não está correto, por favor, tente novamente.',
            method : 'POST',
            colorOn :'#000',
            colorOff :'#999'
        });      
  
});
 