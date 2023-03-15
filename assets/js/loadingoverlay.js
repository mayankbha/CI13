/***************************************************************************************************
LoadingOverlay - A flexible loading overlay jQuery plugin
    Author          : Gaspare Sganga
    Version         : 1.5.3
    License         : MIT
    Documentation   : http://gasparesganga.com/labs/jquery-loading-overlay/
****************************************************************************************************/
(function($, undefined){
    // Default Settings
    var _defaults = {
        color           : "rgba(255, 255, 255, 0.8)",
        custom          : "",
        fade            : true,
        fontawesome     : "",
        image           : "data:image/gif;base64,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",
        imagePosition   : "center center",
        maxSize         : "100px",
        minSize         : "20px",
        resizeInterval  : 50,
        size            : "50%",
        zIndex          : 9999
    };
    
    $.LoadingOverlaySetup = function(settings){
        $.extend(true, _defaults, settings);
    };
    
    $.LoadingOverlay = function(action, options){
        switch (action.toLowerCase()) {
            case "show":
                var settings = $.extend(true, {}, _defaults, options);
                _Show("body", settings);
                break;
                
            case "hide":
                _Hide("body", options);
                break;
        }
    };
    
    $.fn.LoadingOverlay = function(action, options){
        switch (action.toLowerCase()) {
            case "show":
                var settings = $.extend(true, {}, _defaults, options);
                return this.each(function(){
                    _Show(this, settings);
                });
                
            case "hide":
                return this.each(function(){
                    _Hide(this, options);
                });
        }
    };
    
    
    function _Show(container, settings){
        container = $(container);
        var wholePage   = container.is("body");
        var count       = container.data("LoadingOverlayCount");
        if (count === undefined) count = 0;
        if (count == 0) {
            var overlay = $("<div>", {
                class   : "loadingoverlay",
                css     : {
                    "background-color"  : settings.color,
                    "position"          : "relative",
                    "display"           : "flex",
                    "flex-direction"    : "column",
                    "align-items"       : "center",
                    "justify-content"   : "center"
                }
            });
            if (settings.zIndex !== undefined) overlay.css("z-index", settings.zIndex);
            if (settings.image) overlay.css({
                "background-image"      : "url(" + settings.image + ")",
                "background-position"   : settings.imagePosition,
                "background-repeat"     : "no-repeat"
            });
            if (settings.fontawesome) $("<div>", {
                class   : "loadingoverlay_fontawesome " + settings.fontawesome
            }).appendTo(overlay);
            if (settings.custom) $(settings.custom).appendTo(overlay);
            if (wholePage) {
                overlay.css({
                    "position"  : "fixed",
                    "top"       : 0,
                    "left"      : 0,
                    "width"     : "100%",
                    "height"    : "100%"
                });
            } else {
                overlay.css("position", (container.css("position") == "fixed") ? "fixed" : "absolute");
            }
            _Resize(container, overlay, settings, wholePage);
            if (settings.resizeInterval > 0) {
                var resizeIntervalId = setInterval(function(){
                    _Resize(container, overlay, settings, wholePage);
                }, settings.resizeInterval);
                container.data("LoadingOverlayResizeIntervalId", resizeIntervalId);
            }
            if (!settings.fade) {
                settings.fade = [0, 0];
            } else if (settings.fade === true) {
                settings.fade = [400, 200];
            } else if (typeof settings.fade == "string" || typeof settings.fade == "number") {
                settings.fade = [settings.fade, settings.fade];
            }
            container.data({
                "LoadingOverlay"                : overlay,
                "LoadingOverlayFadeOutDuration" : settings.fade[1]
            });
            overlay
                .hide()
                .appendTo("body")
                .fadeIn(settings.fade[0]);
        }
        count++;
        container.data("LoadingOverlayCount", count);
    }

    function _Hide(container, force){
        container = $(container);
        var count = container.data("LoadingOverlayCount");
        if (count === undefined) return;
        count--;
        if (force || count <= 0) {
            var resizeIntervalId = container.data("LoadingOverlayResizeIntervalId");
            if (resizeIntervalId) clearInterval(resizeIntervalId);
            container.data("LoadingOverlay").fadeOut(container.data("LoadingOverlayFadeOutDuration"), function(){
                $(this).remove()
            });
            container.removeData(["LoadingOverlay", "LoadingOverlayCount", "LoadingOverlayFadeOutDuration", "LoadingOverlayResizeIntervalId"]);
        } else {
            container.data("LoadingOverlayCount", count);
        }
    }
    
    function _Resize(container, overlay, settings, wholePage){
        if (!wholePage) {
            var x = (container.css("position") == "fixed") ? container.position() : container.offset();
            overlay.css({
                top     : x.top + parseInt(container.css("border-top-width"), 10),
                left    : x.left + parseInt(container.css("border-left-width"), 10),
                width   : container.innerWidth(),
                height  : container.innerHeight()
            });
        }
        var c    = wholePage ? $(window) : container;
        var size = "auto";
        if (settings.size && settings.size != "auto") {
            size = Math.min(c.innerWidth(), c.innerHeight()) * parseFloat(settings.size) / 100;
            if (settings.maxSize && size > parseInt(settings.maxSize, 10)) size = parseInt(settings.maxSize, 10) + "px";
            if (settings.minSize && size < parseInt(settings.minSize, 10)) size = parseInt(settings.minSize, 10) + "px";
        }
        overlay.css("background-size", size);
        overlay.children(".loadingoverlay_fontawesome").css("font-size", size);
    }
    
}(jQuery));