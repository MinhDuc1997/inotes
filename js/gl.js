 /*!
 * GoogleURLShortener ver 0.1 
 * by Zzbaivong <http://devs.forumvi.com/>
 */
(function(c){c.GoogleURLShortener=function(h){var b=c.extend({key:'AIzaSyC1uVWmFy9aEb_MSCWy_ptWIeum9Nwfcrw',mode:"auto",url:null,success:function(b,a){},error:function(b,a){}},h),g=function(a){b.error(a,{error:{code:400,message:a,data:[{domain:"global",reason:"Invalid",message:a}]}})},a=b.url;""!==a&&/\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/.test(a)&&!/^http:\/\/goo\.gl\/?$/.test(a)?(window.gapi_onload=function(c){var e=gapi.client;e.setApiKey(b.key);e.load("urlshortener","v1",function(d){if("object"==typeof d)b.error(d.error.message,d);else{d=b.mode;var c,f;"auto"==d&&(d=/http:\/\/goo\.gl\/.+/.test(a)?"short":"long");switch(d){case "long":c=e.urlshortener.url.insert({resource:{longUrl:a}});f="id";break;case "short":c=e.urlshortener.url.get({shortUrl:a}),f="longUrl"}c?c.execute(function(a){a.error?b.error(a.error.message,a):null!==a[f]?b.success(a[f],a):b.error(a.error.message,a)}):g("Invalid Setting")}})},c.getScript("https://apis.google.com/js/client.js")):g("Invalid Value")}})(jQuery);

// Ví dụ cách sử dụng với thông số cơ bản
    function get_gl(){
        $.GoogleURLShortener({
            url: $(".google-link-input").val(),
            success: function (url, response) {
                //$("p").text(url);
                document.getElementsByClassName('google-link-input')[0].value = url;
            },
            error: function (message, response) {
                //$("p").text(message);
            }
        });
    }
    function get_gl_auto(link){
        $.GoogleURLShortener({
            url: link,
            success: function (url, response) {
                //$("p").text(url);
                //alert('ok');
                document.getElementsByClassName('google-link-input')[0].value = url;
            },
            error: function (message, response) {
                //$("p").text(message);
                //alert('loi');
            }
        });
    }