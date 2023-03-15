/*!
/*!
 * @copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @version 1.4.3
 *
 * Bootstrap Popover Extended - Popover with modal behavior, styling enhancements and more.
 *
 * For more JQuery/Bootstrap plugins and demos visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
(function (factory) {
    "use strict";
    //noinspection JSUnresolvedVariable
    if (typeof define === 'function' && define.amd) { // jshint ignore:line
        // AMD. Register as an anonymous module.
        define(['jquery'], factory); // jshint ignore:line
    } else { // noinspection JSUnresolvedVariable
        if (typeof module === 'object' && module.exports) { // jshint ignore:line
            // Node/CommonJS
            // noinspection JSUnresolvedVariable
            module.exports = factory(require('jquery')); // jshint ignore:line
        } else {
            // Browser globals
            factory(window.jQuery);
        }
    }
}(function ($) {
    "use strict";
    var kvLog, addCss, handler, raise, PopoverButton, PopoverX, NAMESPACE = '.popoverX';
    kvLog = function (msg) {
        msg = 'bootstrap-popover-x: ' + msg;
        if (window.console && window.console.log) {
            window.console.log(msg);
        } else {
            window.alert(msg);
        }
    };
    addCss = function ($el, css) {
        $el.removeClass(css).addClass(css);
    };
    handler = function ($el, event, callback) {
        var ev = event + NAMESPACE;
        return $el.off(ev).on(ev, callback);
    };
    raise = function ($el, event, prefix) {
        var ev = event + (prefix === undefined ? '.target' : prefix) + NAMESPACE;
        return $el.trigger(ev);
    };
    PopoverButton = function (element, options) {
        var self = this;
        self.options = options;
        self.$element = $(element);
        self.init();
    };
    PopoverX = function (element, options) {
        var self = this;
        self.options = options;
        self.$element = $(element);
        self.$dialog = self.$element;
        self.init();
    };
    PopoverButton.prototype = {
        constructor: PopoverButton,
        init: function () {
            var self = this, $el = self.$element, options = self.options || {}, triggers, $dialog,
                href = $el.attr('href'), initException;
            initException = function(msg) {
                kvLog('PopoverX initialization skipped! ' + msg);
            };
            self.href = href;
            if (!$el || !$el.length) {
                initException('PopoverX triggering button element could not be found.');
                return;
            }
            if (options.target) {
                $dialog = $(options.target);
            } else {
                $dialog = $($el.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))); //strip for ie7
            }
            self.$dialog = $dialog;
            if (!$dialog.length) {
                initException('PopoverX dialog element could not be found.');
                return;
            }
            if (!$dialog.data('popover-x')) {
                var opts = $.extend(true, {remote: href && !/#/.test(href)}, $dialog.data(), $el.data(), options);
                opts.$target = $el;
                $dialog.popoverX(opts);
            }
            triggers = options.trigger;
            if (typeof triggers !== 'string') {
                initException('Invalid or improper configuration for PopoverX trigger.');
                return;
            }
            triggers = triggers.split(" ");
            $.each(triggers, function (key, event) {
                self.listen(event);
            });
        },
        listen: function (ev) {
            var self = this, $el = self.$element, $dialog = self.$dialog, isHover = false, evIn, evOut, href = self.href;
            if (ev === 'manual') {
                return;
            }
            if (ev !== 'click' && ev !== 'keyup') {
                isHover = true;
            }
            if (isHover) {
                evIn = ev === 'hover' ? 'mouseenter' : 'focusin';
                //evOut = ev === 'hover' ? 'mouseleave' : 'focusout';
                handler($el, evIn, function () {
                    raise($dialog, evIn).popoverX('show');
                });
                handler($el, evOut, function () {
                    raise($dialog, evOut).popoverX('hide');
                });
            } else {
                handler($el, ev, function (e) {
                    if (ev === 'keyup') {
                        if ($dialog && e.which === 27) {
                            raise($dialog, ev).popoverX('hide');
                        }
                        return;
                    }
                    if (href && ev === 'click') {
                        e.preventDefault();
                    }
                    raise($dialog, ev).popoverX('toggle');
                    handler($dialog, 'hide', function () {
                        $el.focus();
                    });
                });
            }
        },
        destroy: function() {
            var self = this;
            self.$element.off(NAMESPACE);
            self.$dialog.off(NAMESPACE);
        }
    };
    PopoverX.prototype = $.extend({}, $.fn.modal.Constructor.prototype, {
        constructor: PopoverX,
        init: function () {
            var self = this, $dialog = self.$element, $container = self.options.$container;
            if ($container && $container.length) {
                self.$body = $container;
            }
            if (!self.$body || !self.$body.length) {
                self.$body = $(document.body);
            }
            self.$target = self.options.$target;
            self.$marker = $(document.createElement('div')).addClass('popover-x-marker').insertAfter($dialog).hide();
            if ($dialog.find('.popover-footer').length) {
                addCss($dialog, 'has-footer');
            }
            if (self.options.remote) {
                $dialog.find('.popover-content').load(self.options.remote, function () {
                    $dialog.trigger('load.complete.popoverX');
                });
            }
            $dialog.on('click.dismiss' + NAMESPACE, '[data-dismiss="popover-x"]', $.proxy(self.hide, self));
        },
        getPlacement: function () {
            var self = this, pos = self.getPosition(), placement = self.options.placement,
                de = document.documentElement, db = document.body, cw = de.clientWidth, ch = de.clientHeight,
                scrollTop = Math.max(db.scrollTop || 0, de.scrollTop), isH = placement === 'horizontal',
                scrollLeft = Math.max(db.scrollLeft || 0, de.scrollLeft), isV = placement === 'vertical',
                pageX = Math.max(0, pos.left - scrollLeft), pageY = Math.max(0, pos.top - scrollTop),
                autoPlace = placement === 'auto' || isH || isV;
            if (autoPlace) {
                if (pageX < cw / 3) {
                    if (pageY < ch / 3) {
                        return isH ? 'right right-bottom' : 'bottom bottom-right';
                    }
                    if (pageY < ch * 2 / 3) {
                        return isV ? (pageY <= ch / 2 ? 'bottom bottom-right' : 'top top-right') : 'right';
                    }
                    return isH ? 'right right-top' : 'top top-right';
                }
                if (pageX < cw * 2 / 3) {
                    if (pageY < ch / 3) {
                        return isH ? (pageX <= cw / 2 ? 'right right-bottom' : 'left left-bottom') : 'bottom';
                    }
                    if (pageY < ch * 2 / 3) {
                        return isH ? pageX <= cw / 2 ? 'right' : 'left' : pageY <= ch / 2 ? 'bottom' : 'top';
                    }
                    return isH ? pageX <= cw / 2 ? 'right right-top' : 'left left-top' : 'top';
                }
                if (pageY < ch / 3) {
                    return isH ? 'left left-bottom' : 'bottom bottom-left';
                }
                if (pageY < ch * 2 / 3) {
                    return isV ? pageY <= ch / 2 ? 'bottom-left' : 'top-left' : 'left';
                }
                return isH ? 'left left-top' : 'top top-left';
            }
            switch (placement) {
                case 'auto-top':
                    return pageX < cw / 3 ? 'top top-right' : (pageX < cw * 2 / 3 ? 'top' : 'top top-left');
                case 'auto-bottom':
                    return pageX < cw / 3 ? 'bottom bottom-right' : (pageX < cw * 2 / 3 ? 'bottom' : 'bottom bottom-left');
                case 'auto-left':
                    return pageY < ch / 3 ? 'left left-top' : (pageY < ch * 2 / 3 ? 'left' : 'left left-bottom');
                case 'auto-right':
                    return pageY < ch / 3 ? 'right right-top' : (pageY < ch * 2 / 3 ? 'right' : 'right right-bottom');
                default:
                    return placement;
            }
        },
        getPosition: function () {
            var self = this, $el = self.$target, elRect = $el[0].getBoundingClientRect(), $container = self.$body,
                cssPos = $container.css('position');
            if ($container.is(document.body) || cssPos === 'static') {
                return $.extend({}, $el.offset(), {
                    width: $el[0].offsetWidth || elRect.width,
                    height: $el[0].offsetHeight || elRect.height
                });
            }
            if (cssPos === 'relative') {
                return {
                    top: $el.offset().top - $container.offset().top,
                    left: $el.offset().left - $container.offset().left,
                    width: $el[0].offsetWidth || elRect.width,
                    height: $el[0].offsetHeight || elRect.height
                };
            }
            // else cssPos = 'fixed'
            var containerRect = $container[0].getBoundingClientRect();
            return {
                top: elRect.top - containerRect.top + $container.scrollTop(),
                left: elRect.left - containerRect.left + $container.scrollLeft(),
                width: elRect.width,
                height: elRect.height
            };
        },
        refreshPosition: function () {
            var self = this, $dialog = self.$element, pos = self.getPosition(), position,
                actualWidth = $dialog[0].offsetWidth, actualHeight = $dialog[0].offsetHeight,
                placement = self.getPlacement();
            switch (placement) {
                case 'bottom':
                    position = {top: pos.top + pos.height, left: pos.left + pos.width / 2 - actualWidth / 2};
                    break;
                case 'bottom bottom-left':
                    position = {top: pos.top + pos.height, left: pos.left};
                    break;
                case 'bottom bottom-right':
                    position = {top: pos.top + pos.height, left: pos.left + pos.width - actualWidth};
                    break;
                case 'top':
                    position = {top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2};
                    break;
                case 'top top-left':
                    position = {top: pos.top - actualHeight, left: pos.left};
                    break;
                case 'top top-right':
                    position = {top: pos.top - actualHeight, left: pos.left + pos.width - actualWidth};
                    break;
                case 'left':
                    position = {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth};
                    break;
                case 'left left-top':
                    position = {top: pos.top, left: pos.left - actualWidth};
                    break;
                case 'left left-bottom':
                    position = {top: pos.top + pos.height - actualHeight, left: pos.left - actualWidth};
                    break;
                case 'right':
                    position = {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width};
                    break;
                case 'right right-top':
                    position = {top: pos.top, left: pos.left + pos.width};
                    break;
                case 'right right-bottom':
                    position = {top: pos.top + pos.height - actualHeight, left: pos.left + pos.width};
                    break;
                default:
                    kvLog("Invalid popover placement '" + placement + "'.");
            }
            $dialog.removeClass('bottom top left right bottom-left top-left bottom-right top-right ' +
                'left-bottom left-top right-bottom right-top').css(position).addClass(placement + ' in');
        },
        validateOpenPopovers: function () {
            var self = this, $dialog = self.$element;
            if (!self.options.closeOpenPopovers) {
                return;
            }
            self.$body.find('.popover:visible').each(function () {
                var $popover = $(this);
                if (!$popover.is($dialog)) {
                    $popover.popoverX('hide');
                }
            });
        },
        hide: function () {
            var self = this, $dialog = self.$element;
            self.$body.removeClass('popover-x-body');
            $.fn.modal.Constructor.prototype.hide.apply(self, arguments);
            $dialog.insertBefore(self.$marker);
        },
        show: function (skipValidation) {
            var self = this, $dialog = self.$element;
            $dialog.css({top: 0, left: 0, display: 'block', 'z-index': 1050}).appendTo(self.$body);
            $.fn.modal.Constructor.prototype.show.apply(self, arguments);
            self.$body.css({'padding': 0});
            $dialog.css({'padding': 0});
            addCss(self.$body, 'popover-x-body');
            self.refreshPosition();
            if (!skipValidation) {
                self.validateOpenPopovers();
            }
        },
        destroy: function() {
            var self = this;
            self.$element.off(NAMESPACE);
        }
    });

    $.fn.popoverButton = function (option) {
        var self = this;
        return self.each(function () {
            var $this = $(this), data = $this.data('popover-button'),
                options = $.extend({}, $.fn.popoverButton.defaults, $this.data(), typeof option === 'object' && option);
            if (!data) {
                $this.data('popover-button', (data = new PopoverButton(this, options)));
            }
            if (typeof option === 'string') {
                data[option]();
            }
        });
    };

    $.fn.popoverX = function (option) {
        var self = this;
        return self.each(function () {
            var $this = $(this), data = $this.data('popover-x'),
                options = $.extend({}, $.fn.popoverX.defaults, $this.data(), typeof option === 'object' && option);
            if (!options.$target) {
                if (data && data.$target) {
                    options.$target = data.$target;
                } else {
                    options.$target = option.$target || $(option.target);
                }
            }
            if (!data) {
                $this.data('popover-x', (data = new PopoverX(this, options)));
            }
            if (typeof option === 'string') {
                data[option]();
            } else {
                if (options.show) {
                    data.show(true);
                }
            }
        });
    };

    $.fn.popoverButton.defaults = {trigger: 'hover'};
    $.fn.popoverX.defaults = $.extend(true, {}, $.fn.modal.defaults, {
        placement: 'auto',
        keyboard: true,
        closeOpenPopovers: true,
        show: false,
        backdrop: null
    });
    $.fn.popoverButton.Constructor = PopoverButton;
    $.fn.popoverX.Constructor = PopoverX;

    $(document).on('ready', function () {
        var $btns = $("[data-toggle='popover-x123']");
        if ($btns.length) {
            $btns.popoverButton();
        }
    });
}));