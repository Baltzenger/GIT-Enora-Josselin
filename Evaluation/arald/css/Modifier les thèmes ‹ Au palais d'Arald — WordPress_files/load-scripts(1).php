!function(a){a.fn.hoverIntent=function(b,c,d){var e={interval:100,sensitivity:6,timeout:0};e="object"==typeof b?a.extend(e,b):a.isFunction(c)?a.extend(e,{over:b,out:c,selector:d}):a.extend(e,{over:b,out:b,selector:c});var f,g,h,i,j=function(a){f=a.pageX,g=a.pageY},k=function(b,c){return c.hoverIntent_t=clearTimeout(c.hoverIntent_t),Math.sqrt((h-f)*(h-f)+(i-g)*(i-g))<e.sensitivity?(a(c).off("mousemove.hoverIntent",j),c.hoverIntent_s=!0,e.over.apply(c,[b])):(h=f,i=g,c.hoverIntent_t=setTimeout(function(){k(b,c)},e.interval),void 0)},l=function(a,b){return b.hoverIntent_t=clearTimeout(b.hoverIntent_t),b.hoverIntent_s=!1,e.out.apply(b,[a])},m=function(b){var c=a.extend({},b),d=this;d.hoverIntent_t&&(d.hoverIntent_t=clearTimeout(d.hoverIntent_t)),"mouseenter"===b.type?(h=c.pageX,i=c.pageY,a(d).on("mousemove.hoverIntent",j),d.hoverIntent_s||(d.hoverIntent_t=setTimeout(function(){k(c,d)},e.interval))):(a(d).off("mousemove.hoverIntent",j),d.hoverIntent_s&&(d.hoverIntent_t=setTimeout(function(){l(c,d)},e.timeout)))};return this.on({"mouseenter.hoverIntent":m,"mouseleave.hoverIntent":m},e.selector)}}(jQuery);
var showNotice,adminMenu,columns,validateForm,screenMeta;!function(a,b,c){var d=a(document),e=a(b),f=a(document.body);adminMenu={init:function(){},fold:function(){},restoreMenuState:function(){},toggle:function(){},favorites:function(){}},columns={init:function(){var b=this;a(".hide-column-tog","#adv-settings").click(function(){var c=a(this),d=c.val();c.prop("checked")?b.checked(d):b.unchecked(d),columns.saveManageColumnsState()})},saveManageColumnsState:function(){var b=this.hidden();a.post(ajaxurl,{action:"hidden-columns",hidden:b,screenoptionnonce:a("#screenoptionnonce").val(),page:pagenow})},checked:function(b){a(".column-"+b).removeClass("hidden"),this.colSpanChange(1)},unchecked:function(b){a(".column-"+b).addClass("hidden"),this.colSpanChange(-1)},hidden:function(){return a(".manage-column[id]").filter(":hidden").map(function(){return this.id}).get().join(",")},useCheckboxesForHidden:function(){this.hidden=function(){return a(".hide-column-tog").not(":checked").map(function(){var a=this.id;return a.substring(a,a.length-5)}).get().join(",")}},colSpanChange:function(b){var c,d=a("table").find(".colspanchange");d.length&&(c=parseInt(d.attr("colspan"),10)+b,d.attr("colspan",c.toString()))}},d.ready(function(){columns.init()}),validateForm=function(b){return!a(b).find(".form-required").filter(function(){return""===a("input:visible",this).val()}).addClass("form-invalid").find("input:visible").change(function(){a(this).closest(".form-invalid").removeClass("form-invalid")}).length},showNotice={warn:function(){var a=commonL10n.warnDelete||"";return!!confirm(a)},note:function(a){alert(a)}},screenMeta={element:null,toggles:null,page:null,init:function(){this.element=a("#screen-meta"),this.toggles=a("#screen-meta-links").find(".show-settings"),this.page=a("#wpcontent"),this.toggles.click(this.toggleEvent)},toggleEvent:function(){var b=a("#"+a(this).attr("aria-controls"));b.length&&(b.is(":visible")?screenMeta.close(b,a(this)):screenMeta.open(b,a(this)))},open:function(b,c){a("#screen-meta-links").find(".screen-meta-toggle").not(c.parent()).css("visibility","hidden"),b.parent().show(),b.slideDown("fast",function(){b.focus(),c.addClass("screen-meta-active").attr("aria-expanded",!0)}),d.trigger("screen:options:open")},close:function(b,c){b.slideUp("fast",function(){c.removeClass("screen-meta-active").attr("aria-expanded",!1),a(".screen-meta-toggle").css("visibility",""),b.parent().hide()}),d.trigger("screen:options:close")}},a(".contextual-help-tabs").delegate("a","click",function(b){var c,d=a(this);return b.preventDefault(),!d.is(".active a")&&(a(".contextual-help-tabs .active").removeClass("active"),d.parent("li").addClass("active"),c=a(d.attr("href")),a(".help-tab-content").not(c).removeClass("active").hide(),void c.addClass("active").show())}),d.ready(function(){function c(){var c,d=a("a.wp-has-current-submenu");c=b.innerWidth?Math.max(b.innerWidth,document.documentElement.clientWidth):961,f.hasClass("folded")||f.hasClass("auto-fold")&&c&&c<=960&&c>782?d.attr("aria-haspopup","true"):d.attr("aria-haspopup","false")}function g(a){var b,c,d,f,g,h,i,j=a.find(".wp-submenu");g=a.offset().top,h=e.scrollTop(),i=g-h-30,b=g+j.height()+1,c=C.height(),d=60+b-c,f=e.height()+h-50,f<b-d&&(d=b-f),d>i&&(d=i),d>1?j.css("margin-top","-"+d+"px"):j.css("margin-top","")}function h(){a(".notice.is-dismissible").each(function(){var b=a(this),c=a('<button type="button" class="notice-dismiss"><span class="screen-reader-text"></span></button>'),d=commonL10n.dismiss||"";c.find(".screen-reader-text").text(d),c.on("click.wp-dismiss-notice",function(a){a.preventDefault(),b.fadeTo(100,0,function(){b.slideUp(100,function(){b.remove()})})}),b.append(c)})}function i(a){var b=e.scrollTop(),c=!a||"scroll"!==a.type;if(!(y||A||D.data("wp-responsive"))){if(P.menu+P.adminbar<P.window||P.menu+P.adminbar+20>P.wpwrap)return void k();if(O=!0,P.menu+P.adminbar>P.window){if(b<0)return void(L||(L=!0,M=!1,B.css({position:"fixed",top:"",bottom:""})));if(b+P.window>d.height()-1)return void(M||(M=!0,L=!1,B.css({position:"fixed",top:"",bottom:0})));b>K?L?(L=!1,N=B.offset().top-P.adminbar-(b-K),N+P.menu+P.adminbar<b+P.window&&(N=b+P.window-P.menu-P.adminbar),B.css({position:"absolute",top:N,bottom:""})):!M&&B.offset().top+P.menu<b+P.window&&(M=!0,B.css({position:"fixed",top:"",bottom:0})):b<K?M?(M=!1,N=B.offset().top-P.adminbar+(K-b),N+P.menu>b+P.window&&(N=b),B.css({position:"absolute",top:N,bottom:""})):!L&&B.offset().top>=b+P.adminbar&&(L=!0,B.css({position:"fixed",top:"",bottom:""})):c&&(L=M=!1,N=b+P.window-P.menu-P.adminbar-1,N>0?B.css({position:"absolute",top:N,bottom:""}):k())}K=b}}function j(){P={window:e.height(),wpwrap:C.height(),adminbar:J.height(),menu:B.height()}}function k(){!y&&O&&(L=M=O=!1,B.css({position:"",top:"",bottom:""}))}function l(){j(),D.data("wp-responsive")?(f.removeClass("sticky-menu"),k()):P.menu+P.adminbar>P.window?(i(),f.removeClass("sticky-menu")):(f.addClass("sticky-menu"),k())}function m(){a(".aria-button-if-js").attr("role","button")}var n,o,p,q,r,s,t,u,v=!1,w=a("input.current-page"),x=w.val(),y=/iPhone|iPad|iPod/.test(navigator.userAgent),z=navigator.userAgent.indexOf("Android")!==-1,A=a(document.documentElement).hasClass("ie8"),B=a("#adminmenuwrap"),C=a("#wpwrap"),D=a("#adminmenu"),E=a("#wp-responsive-overlay"),F=a("#wp-toolbar"),G=F.find('a[aria-haspopup="true"]'),H=a(".meta-box-sortables"),I=!1,J=a("#wpadminbar"),K=0,L=!1,M=!1,N=0,O=!1,P={window:e.height(),wpwrap:C.height(),adminbar:J.height(),menu:B.height()};D.on("click.wp-submenu-head",".wp-submenu-head",function(b){a(b.target).parent().siblings("a").get(0).click()}),a("#collapse-menu").on("click.collapse-menu",function(){var e,g;a("#adminmenu div.wp-submenu").css("margin-top",""),e=b.innerWidth?Math.max(b.innerWidth,document.documentElement.clientWidth):961,e&&e<960?f.hasClass("auto-fold")?(f.removeClass("auto-fold").removeClass("folded"),setUserSetting("unfold",1),setUserSetting("mfold","o"),g="open"):(f.addClass("auto-fold"),setUserSetting("unfold",0),g="folded"):f.hasClass("folded")?(f.removeClass("folded"),setUserSetting("mfold","o"),g="open"):(f.addClass("folded"),setUserSetting("mfold","f"),g="folded"),c(),d.trigger("wp-collapse-menu",{state:g})}),d.on("wp-window-resized wp-responsive-activate wp-responsive-deactivate",c),("ontouchstart"in b||/IEMobile\/[1-9]/.test(navigator.userAgent))&&(s=y?"touchstart":"click",f.on(s+".wp-mobile-hover",function(b){D.data("wp-responsive")||a(b.target).closest("#adminmenu").length||D.find("li.opensub").removeClass("opensub")}),D.find("a.wp-has-submenu").on(s+".wp-mobile-hover",function(b){var c=a(this).parent();D.data("wp-responsive")||c.hasClass("opensub")||c.hasClass("wp-menu-open")&&!(c.width()<40)||(b.preventDefault(),g(c),D.find("li.opensub").removeClass("opensub"),c.addClass("opensub"))})),y||z||(D.find("li.wp-has-submenu").hoverIntent({over:function(){var b=a(this),c=b.find(".wp-submenu"),d=parseInt(c.css("top"),10);isNaN(d)||d>-5||D.data("wp-responsive")||(g(b),D.find("li.opensub").removeClass("opensub"),b.addClass("opensub"))},out:function(){D.data("wp-responsive")||a(this).removeClass("opensub").find(".wp-submenu").css("margin-top","")},timeout:200,sensitivity:7,interval:90}),D.on("focus.adminmenu",".wp-submenu a",function(b){D.data("wp-responsive")||a(b.target).closest("li.menu-top").addClass("opensub")}).on("blur.adminmenu",".wp-submenu a",function(b){D.data("wp-responsive")||a(b.target).closest("li.menu-top").removeClass("opensub")}).find("li.wp-has-submenu.wp-not-current-submenu").on("focusin.adminmenu",function(){g(a(this))})),a("div.updated, div.error, div.notice").not(".inline, .below-h2").insertAfter(a(".wrap h1, .wrap h2").first()),d.on("wp-updates-notice-added wp-plugin-install-error wp-plugin-update-error wp-plugin-delete-error wp-theme-install-error wp-theme-delete-error",h),screenMeta.init(),a("tbody").children().children(".check-column").find(":checkbox").click(function(b){if("undefined"==b.shiftKey)return!0;if(b.shiftKey){if(!v)return!0;n=a(v).closest("form").find(":checkbox").filter(":visible:enabled"),o=n.index(v),p=n.index(this),q=a(this).prop("checked"),0<o&&0<p&&o!=p&&(r=p>o?n.slice(o,p):n.slice(p,o),r.prop("checked",function(){return!!a(this).closest("tr").is(":visible")&&q}))}v=this;var c=a(this).closest("tbody").find(":checkbox").filter(":visible:enabled").not(":checked");return a(this).closest("table").children("thead, tfoot").find(":checkbox").prop("checked",function(){return 0===c.length}),!0}),a("thead, tfoot").find(".check-column :checkbox").on("click.wp-toggle-checkboxes",function(b){var c=a(this),d=c.closest("table"),e=c.prop("checked"),f=b.shiftKey||c.data("wp-toggle");d.children("tbody").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!a(this).is(":hidden,:disabled")&&(f?!a(this).prop("checked"):!!e)}),d.children("thead,  tfoot").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!f&&!!e})}),a("#wpbody-content").on({focusin:function(){clearTimeout(t),u=a(this).find(".row-actions"),a(".row-actions").not(this).removeClass("visible"),u.addClass("visible")},focusout:function(){t=setTimeout(function(){u.removeClass("visible")},30)}},".has-row-actions"),a("tbody").on("click",".toggle-row",function(){a(this).closest("tr").toggleClass("is-expanded")}),a("#default-password-nag-no").click(function(){return setUserSetting("default_password_nag","hide"),a("div.default-password-nag").hide(),!1}),a("#newcontent").bind("keydown.wpevent_InsertTab",function(b){var c,d,e,f,g,h=b.target;if(27==b.keyCode)return b.preventDefault(),void a(h).data("tab-out",!0);if(!(9!=b.keyCode||b.ctrlKey||b.altKey||b.shiftKey)){if(a(h).data("tab-out"))return void a(h).data("tab-out",!1);c=h.selectionStart,d=h.selectionEnd,e=h.value,document.selection?(h.focus(),g=document.selection.createRange(),g.text="\t"):c>=0&&(f=this.scrollTop,h.value=e.substring(0,c).concat("\t",e.substring(d)),h.selectionStart=h.selectionEnd=c+1,this.scrollTop=f),b.stopPropagation&&b.stopPropagation(),b.preventDefault&&b.preventDefault()}}),w.length&&w.closest("form").submit(function(){a('select[name="action"]').val()==-1&&a('select[name="action2"]').val()==-1&&w.val()==x&&w.val("1")}),a('.search-box input[type="search"], .search-box input[type="submit"]').mousedown(function(){a('select[name^="action"]').val("-1")}),a("#contextual-help-link, #show-settings-link").on("focus.scroll-into-view",function(a){a.target.scrollIntoView&&a.target.scrollIntoView(!1)}),function(){function b(){c.prop("disabled",""===d.map(function(){return a(this).val()}).get().join(""))}var c,d,e=a("form.wp-upload-form");e.length&&(c=e.find('input[type="submit"]'),d=e.find('input[type="file"]'),b(),d.on("change",b))}(),y||(e.on("scroll.pin-menu",i),d.on("tinymce-editor-init.pin-menu",function(a,b){b.on("wp-autoresize",j)})),b.wpResponsive={init:function(){var c=this;d.on("wp-responsive-activate.wp-responsive",function(){c.activate()}).on("wp-responsive-deactivate.wp-responsive",function(){c.deactivate()}),a("#wp-admin-bar-menu-toggle a").attr("aria-expanded","false"),a("#wp-admin-bar-menu-toggle").on("click.wp-responsive",function(b){b.preventDefault(),J.find(".hover").removeClass("hover"),C.toggleClass("wp-responsive-open"),C.hasClass("wp-responsive-open")?(a(this).find("a").attr("aria-expanded","true"),a("#adminmenu a:first").focus()):a(this).find("a").attr("aria-expanded","false")}),D.on("click.wp-responsive","li.wp-has-submenu > a",function(b){D.data("wp-responsive")&&(a(this).parent("li").toggleClass("selected"),b.preventDefault())}),c.trigger(),d.on("wp-window-resized.wp-responsive",a.proxy(this.trigger,this)),e.on("load.wp-responsive",function(){var a=navigator.userAgent.indexOf("AppleWebKit/")>-1?e.width():b.innerWidth;a<=782&&c.disableSortables()})},activate:function(){l(),f.hasClass("auto-fold")||f.addClass("auto-fold"),D.data("wp-responsive",1),this.disableSortables()},deactivate:function(){l(),D.removeData("wp-responsive"),this.enableSortables()},trigger:function(){var a;b.innerWidth&&(a=Math.max(b.innerWidth,document.documentElement.clientWidth),a<=782?I||(d.trigger("wp-responsive-activate"),I=!0):I&&(d.trigger("wp-responsive-deactivate"),I=!1),a<=480?this.enableOverlay():this.disableOverlay())},enableOverlay:function(){0===E.length&&(E=a('<div id="wp-responsive-overlay"></div>').insertAfter("#wpcontent").hide().on("click.wp-responsive",function(){F.find(".menupop.hover").removeClass("hover"),a(this).hide()})),G.on("click.wp-responsive",function(){E.show()})},disableOverlay:function(){G.off("click.wp-responsive"),E.hide()},disableSortables:function(){if(H.length)try{H.sortable("disable")}catch(a){}},enableSortables:function(){if(H.length)try{H.sortable("enable")}catch(a){}}},a(document).ajaxComplete(function(){m()}),b.wpResponsive.init(),l(),c(),h(),m(),d.on("wp-pin-menu wp-window-resized.pin-menu postboxes-columnchange.pin-menu postbox-toggled.pin-menu wp-collapse-menu.pin-menu wp-scroll-start.pin-menu",l),a(".wp-initial-focus").focus()}),function(){function a(){d.trigger("wp-window-resized")}function c(){b.clearTimeout(f),f=b.setTimeout(a,200)}var f;e.on("resize.wp-fire-once",c)}(),function(){if("-ms-user-select"in document.documentElement.style&&navigator.userAgent.match(/IEMobile\/10\.0/)){var a=document.createElement("style");a.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),document.getElementsByTagName("head")[0].appendChild(a)}}()}(jQuery,window);
"undefined"!=typeof jQuery?("undefined"==typeof jQuery.fn.hoverIntent&&!function(a){a.fn.hoverIntent=function(b,c,d){var e={interval:100,sensitivity:6,timeout:0};e="object"==typeof b?a.extend(e,b):a.isFunction(c)?a.extend(e,{over:b,out:c,selector:d}):a.extend(e,{over:b,out:b,selector:c});var f,g,h,i,j=function(a){f=a.pageX,g=a.pageY},k=function(b,c){return c.hoverIntent_t=clearTimeout(c.hoverIntent_t),Math.sqrt((h-f)*(h-f)+(i-g)*(i-g))<e.sensitivity?(a(c).off("mousemove.hoverIntent",j),c.hoverIntent_s=!0,e.over.apply(c,[b])):(h=f,i=g,void(c.hoverIntent_t=setTimeout(function(){k(b,c)},e.interval)))},l=function(a,b){return b.hoverIntent_t=clearTimeout(b.hoverIntent_t),b.hoverIntent_s=!1,e.out.apply(b,[a])},m=function(b){var c=a.extend({},b),d=this;d.hoverIntent_t&&(d.hoverIntent_t=clearTimeout(d.hoverIntent_t)),"mouseenter"===b.type?(h=c.pageX,i=c.pageY,a(d).on("mousemove.hoverIntent",j),d.hoverIntent_s||(d.hoverIntent_t=setTimeout(function(){k(c,d)},e.interval))):(a(d).off("mousemove.hoverIntent",j),d.hoverIntent_s&&(d.hoverIntent_t=setTimeout(function(){l(c,d)},e.timeout)))};return this.on({"mouseenter.hoverIntent":m,"mouseleave.hoverIntent":m},e.selector)}}(jQuery),jQuery(document).ready(function(a){var b,c,d,e=a("#wpadminbar"),f=!1;b=function(b,c){var d=a(c),e=d.attr("tabindex");e&&d.attr("tabindex","0").attr("tabindex",e)},c=function(b){e.find("li.menupop").on("click.wp-mobile-hover",function(c){var d=a(this);d.parent().is("#wp-admin-bar-root-default")&&!d.hasClass("hover")?(c.preventDefault(),e.find("li.menupop.hover").removeClass("hover"),d.addClass("hover")):d.hasClass("hover")?a(c.target).closest("div").hasClass("ab-sub-wrapper")||(c.stopPropagation(),c.preventDefault(),d.removeClass("hover")):(c.stopPropagation(),c.preventDefault(),d.addClass("hover")),b&&(a("li.menupop").off("click.wp-mobile-hover"),f=!1)})},d=function(){var b=/Mobile\/.+Safari/.test(navigator.userAgent)?"touchstart":"click";a(document.body).on(b+".wp-mobile-hover",function(b){a(b.target).closest("#wpadminbar").length||e.find("li.menupop.hover").removeClass("hover")})},e.removeClass("nojq").removeClass("nojs"),"ontouchstart"in window?(e.on("touchstart",function(){c(!0),f=!0}),d()):/IEMobile\/[1-9]/.test(navigator.userAgent)&&(c(),d()),e.find("li.menupop").hoverIntent({over:function(){f||a(this).addClass("hover")},out:function(){f||a(this).removeClass("hover")},timeout:180,sensitivity:7,interval:100}),window.location.hash&&window.scrollBy(0,-32),a("#wp-admin-bar-get-shortlink").click(function(b){b.preventDefault(),a(this).addClass("selected").children(".shortlink-input").blur(function(){a(this).parents("#wp-admin-bar-get-shortlink").removeClass("selected")}).focus().select()}),a("#wpadminbar li.menupop > .ab-item").bind("keydown.adminbar",function(c){if(13==c.which){var d=a(c.target),e=d.closest(".ab-sub-wrapper"),f=d.parent().hasClass("hover");c.stopPropagation(),c.preventDefault(),e.length||(e=a("#wpadminbar .quicklinks")),e.find(".menupop").removeClass("hover"),f||d.parent().toggleClass("hover"),d.siblings(".ab-sub-wrapper").find(".ab-item").each(b)}}).each(b),a("#wpadminbar .ab-item").bind("keydown.adminbar",function(c){if(27==c.which){var d=a(c.target);c.stopPropagation(),c.preventDefault(),d.closest(".hover").removeClass("hover").children(".ab-item").focus(),d.siblings(".ab-sub-wrapper").find(".ab-item").each(b)}}),e.click(function(b){"wpadminbar"!=b.target.id&&"wp-admin-bar-top-secondary"!=b.target.id||(e.find("li.menupop.hover").removeClass("hover"),a("html, body").animate({scrollTop:0},"fast"),b.preventDefault())}),a(".screen-reader-shortcut").keydown(function(b){var c,d;13==b.which&&(c=a(this).attr("href"),d=navigator.userAgent.toLowerCase(),d.indexOf("applewebkit")!=-1&&c&&"#"==c.charAt(0)&&setTimeout(function(){a(c).focus()},100))}),a("#adminbar-search").on({focus:function(){a("#adminbarsearch").addClass("adminbar-focused")},blur:function(){a("#adminbarsearch").removeClass("adminbar-focused")}}),"sessionStorage"in window&&a("#wp-admin-bar-logout a").click(function(){try{for(var a in sessionStorage)a.indexOf("wp-autosave-")!=-1&&sessionStorage.removeItem(a)}catch(b){}}),navigator.userAgent&&document.body.className.indexOf("no-font-face")===-1&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)&&(document.body.className+=" no-font-face")})):!function(a,b){var c,d=function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,function(){return c.call(a,window.event)})},e=new RegExp("\\bhover\\b","g"),f=[],g=new RegExp("\\bselected\\b","g"),h=function(a){for(var b=f.length;b--;)if(f[b]&&a==f[b][1])return f[b][0];return!1},i=function(b){for(var d,i,j,k,l,m,n=[],o=0;b&&b!=c&&b!=a;)"LI"==b.nodeName.toUpperCase()&&(n[n.length]=b,i=h(b),i&&clearTimeout(i),b.className=b.className?b.className.replace(e,"")+" hover":"hover",k=b),b=b.parentNode;if(k&&k.parentNode&&(l=k.parentNode,l&&"UL"==l.nodeName.toUpperCase()))for(d=l.childNodes.length;d--;)m=l.childNodes[d],m!=k&&(m.className=m.className?m.className.replace(g,""):"");for(d=f.length;d--;){for(j=!1,o=n.length;o--;)n[o]==f[d][1]&&(j=!0);j||(f[d][1].className=f[d][1].className?f[d][1].className.replace(e,""):"")}},j=function(b){for(;b&&b!=c&&b!=a;)"LI"==b.nodeName.toUpperCase()&&!function(a){var b=setTimeout(function(){a.className=a.className?a.className.replace(e,""):""},500);f[f.length]=[b,a]}(b),b=b.parentNode},k=function(b){for(var d,e,f,h=b.target||b.srcElement;;){if(!h||h==a||h==c)return;if(h.id&&"wp-admin-bar-get-shortlink"==h.id)break;h=h.parentNode}for(b.preventDefault&&b.preventDefault(),b.returnValue=!1,-1==h.className.indexOf("selected")&&(h.className+=" selected"),d=0,e=h.childNodes.length;d<e;d++)if(f=h.childNodes[d],f.className&&-1!=f.className.indexOf("shortlink-input")){f.focus(),f.select(),f.onblur=function(){h.className=h.className?h.className.replace(g,""):""};break}return!1},l=function(a){var b,c,d,e,f,g;if(!("wpadminbar"!=a.id&&"wp-admin-bar-top-secondary"!=a.id||(b=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0,b<1)))for(g=b>800?130:100,c=Math.min(12,Math.round(b/g)),d=b>800?Math.round(b/30):Math.round(b/20),e=[],f=0;b;)b-=d,b<0&&(b=0),e.push(b),setTimeout(function(){window.scrollTo(0,e.shift())},f*c),f++};d(b,"load",function(){c=a.getElementById("wpadminbar"),a.body&&c&&(a.body.appendChild(c),c.className&&(c.className=c.className.replace(/nojs/,"")),d(c,"mouseover",function(a){i(a.target||a.srcElement)}),d(c,"mouseout",function(a){j(a.target||a.srcElement)}),d(c,"click",k),d(c,"click",function(a){l(a.target||a.srcElement)}),d(document.getElementById("wp-admin-bar-logout"),"click",function(){if("sessionStorage"in window)try{for(var a in sessionStorage)a.indexOf("wp-autosave-")!=-1&&sessionStorage.removeItem(a)}catch(b){}})),b.location.hash&&b.scrollBy(0,-32),navigator.userAgent&&document.body.className.indexOf("no-font-face")===-1&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)&&(document.body.className+=" no-font-face")})}(document,window);
/**
 * Attempt to re-color SVG icons used in the admin menu or the toolbar
 *
 */

window.wp = window.wp || {};

wp.svgPainter = ( function( $, window, document, undefined ) {
	'use strict';
	var selector, base64, painter,
		colorscheme = {},
		elements = [];

	$(document).ready( function() {
		// detection for browser SVG capability
		if ( document.implementation.hasFeature( 'http://www.w3.org/TR/SVG11/feature#Image', '1.1' ) ) {
			$( document.body ).removeClass( 'no-svg' ).addClass( 'svg' );
			wp.svgPainter.init();
		}
	});

	/**
	 * Needed only for IE9
	 *
	 * Based on jquery.base64.js 0.0.3 - https://github.com/yckart/jquery.base64.js
	 *
	 * Based on: https://gist.github.com/Yaffle/1284012
	 *
	 * Copyright (c) 2012 Yannick Albert (http://yckart.com)
	 * Licensed under the MIT license
	 * http://www.opensource.org/licenses/mit-license.php
	 */
	base64 = ( function() {
		var c,
			b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/',
			a256 = '',
			r64 = [256],
			r256 = [256],
			i = 0;

		function init() {
			while( i < 256 ) {
				c = String.fromCharCode(i);
				a256 += c;
				r256[i] = i;
				r64[i] = b64.indexOf(c);
				++i;
			}
		}

		function code( s, discard, alpha, beta, w1, w2 ) {
			var tmp, length,
				buffer = 0,
				i = 0,
				result = '',
				bitsInBuffer = 0;

			s = String(s);
			length = s.length;

			while( i < length ) {
				c = s.charCodeAt(i);
				c = c < 256 ? alpha[c] : -1;

				buffer = ( buffer << w1 ) + c;
				bitsInBuffer += w1;

				while( bitsInBuffer >= w2 ) {
					bitsInBuffer -= w2;
					tmp = buffer >> bitsInBuffer;
					result += beta.charAt(tmp);
					buffer ^= tmp << bitsInBuffer;
				}
				++i;
			}

			if ( ! discard && bitsInBuffer > 0 ) {
				result += beta.charAt( buffer << ( w2 - bitsInBuffer ) );
			}

			return result;
		}

		function btoa( plain ) {
			if ( ! c ) {
				init();
			}

			plain = code( plain, false, r256, b64, 8, 6 );
			return plain + '===='.slice( ( plain.length % 4 ) || 4 );
		}

		function atob( coded ) {
			var i;

			if ( ! c ) {
				init();
			}

			coded = coded.replace( /[^A-Za-z0-9\+\/\=]/g, '' );
			coded = String(coded).split('=');
			i = coded.length;

			do {
				--i;
				coded[i] = code( coded[i], true, r64, a256, 6, 8 );
			} while ( i > 0 );

			coded = coded.join('');
			return coded;
		}

		return {
			atob: atob,
			btoa: btoa
		};
	})();

	return {
		init: function() {
			painter = this;
			selector = $( '#adminmenu .wp-menu-image, #wpadminbar .ab-item' );

			this.setColors();
			this.findElements();
			this.paint();
		},

		setColors: function( colors ) {
			if ( typeof colors === 'undefined' && typeof window._wpColorScheme !== 'undefined' ) {
				colors = window._wpColorScheme;
			}

			if ( colors && colors.icons && colors.icons.base && colors.icons.current && colors.icons.focus ) {
				colorscheme = colors.icons;
			}
		},

		findElements: function() {
			selector.each( function() {
				var $this = $(this), bgImage = $this.css( 'background-image' );

				if ( bgImage && bgImage.indexOf( 'data:image/svg+xml;base64' ) != -1 ) {
					elements.push( $this );
				}
			});
		},

		paint: function() {
			// loop through all elements
			$.each( elements, function( index, $element ) {
				var $menuitem = $element.parent().parent();

				if ( $menuitem.hasClass( 'current' ) || $menuitem.hasClass( 'wp-has-current-submenu' ) ) {
					// paint icon in 'current' color
					painter.paintElement( $element, 'current' );
				} else {
					// paint icon in base color
					painter.paintElement( $element, 'base' );

					// set hover callbacks
					$menuitem.hover(
						function() {
							painter.paintElement( $element, 'focus' );
						},
						function() {
							// Match the delay from hoverIntent
							window.setTimeout( function() {
								painter.paintElement( $element, 'base' );
							}, 100 );
						}
					);
				}
			});
		},

		paintElement: function( $element, colorType ) {
			var xml, encoded, color;

			if ( ! colorType || ! colorscheme.hasOwnProperty( colorType ) ) {
				return;
			}

			color = colorscheme[ colorType ];

			// only accept hex colors: #101 or #101010
			if ( ! color.match( /^(#[0-9a-f]{3}|#[0-9a-f]{6})$/i ) ) {
				return;
			}

			xml = $element.data( 'wp-ui-svg-' + color );

			if ( xml === 'none' ) {
				return;
			}

			if ( ! xml ) {
				encoded = $element.css( 'background-image' ).match( /.+data:image\/svg\+xml;base64,([A-Za-z0-9\+\/\=]+)/ );

				if ( ! encoded || ! encoded[1] ) {
					$element.data( 'wp-ui-svg-' + color, 'none' );
					return;
				}

				try {
					if ( 'atob' in window ) {
						xml = window.atob( encoded[1] );
					} else {
						xml = base64.atob( encoded[1] );
					}
				} catch ( error ) {}

				if ( xml ) {
					// replace `fill` attributes
					xml = xml.replace( /fill="(.+?)"/g, 'fill="' + color + '"');

					// replace `style` attributes
					xml = xml.replace( /style="(.+?)"/g, 'style="fill:' + color + '"');

					// replace `fill` properties in `<style>` tags
					xml = xml.replace( /fill:.*?;/g, 'fill: ' + color + ';');

					if ( 'btoa' in window ) {
						xml = window.btoa( xml );
					} else {
						xml = base64.btoa( xml );
					}

					$element.data( 'wp-ui-svg-' + color, xml );
				} else {
					$element.data( 'wp-ui-svg-' + color, 'none' );
					return;
				}
			}

			$element.attr( 'style', 'background-image: url("data:image/svg+xml;base64,' + xml + '") !important;' );
		}
	};

})( jQuery, window, document );

!function(a,b,c){var d=function(){function d(){var c,d,f,h;"string"==typeof b.pagenow&&(z.screenId=b.pagenow),"string"==typeof b.ajaxurl&&(z.url=b.ajaxurl),"object"==typeof b.heartbeatSettings&&(c=b.heartbeatSettings,!z.url&&c.ajaxurl&&(z.url=c.ajaxurl),c.interval&&(z.mainInterval=c.interval,z.mainInterval<15?z.mainInterval=15:z.mainInterval>120&&(z.mainInterval=120)),c.minimalInterval&&(c.minimalInterval=parseInt(c.minimalInterval,10),z.minimalInterval=c.minimalInterval>0&&c.minimalInterval<=600?1e3*c.minimalInterval:0),z.minimalInterval&&z.mainInterval<z.minimalInterval&&(z.mainInterval=z.minimalInterval),z.screenId||(z.screenId=c.screenId||"front"),"disable"===c.suspension&&(z.suspendEnabled=!1)),z.mainInterval=1e3*z.mainInterval,z.originalInterval=z.mainInterval,"undefined"!=typeof document.hidden?(d="hidden",h="visibilitychange",f="visibilityState"):"undefined"!=typeof document.msHidden?(d="msHidden",h="msvisibilitychange",f="msVisibilityState"):"undefined"!=typeof document.webkitHidden&&(d="webkitHidden",h="webkitvisibilitychange",f="webkitVisibilityState"),d&&(document[d]&&(z.hasFocus=!1),y.on(h+".wp-heartbeat",function(){"hidden"===document[f]?(l(),b.clearInterval(z.checkFocusTimer)):(m(),document.hasFocus&&(z.checkFocusTimer=b.setInterval(g,1e4)))})),document.hasFocus&&(z.checkFocusTimer=b.setInterval(g,1e4)),a(b).on("unload.wp-heartbeat",function(){z.suspend=!0,z.xhr&&4!==z.xhr.readyState&&z.xhr.abort()}),b.setInterval(o,3e4),y.ready(function(){z.lastTick=e(),k()})}function e(){return(new Date).getTime()}function f(a){var c,d=a.src;if(d&&/^https?:\/\//.test(d)&&(c=b.location.origin?b.location.origin:b.location.protocol+"//"+b.location.host,0!==d.indexOf(c)))return!1;try{if(a.contentWindow.document)return!0}catch(e){}return!1}function g(){z.hasFocus&&!document.hasFocus()?l():!z.hasFocus&&document.hasFocus()&&m()}function h(a,b){var c;if(a){switch(a){case"abort":break;case"timeout":c=!0;break;case"error":if(503===b&&z.hasConnected){c=!0;break}case"parsererror":case"empty":case"unknown":z.errorcount++,z.errorcount>2&&z.hasConnected&&(c=!0)}c&&!q()&&(z.connectionError=!0,y.trigger("heartbeat-connection-lost",[a,b]))}}function i(){z.hasConnected=!0,q()&&(z.errorcount=0,z.connectionError=!1,y.trigger("heartbeat-connection-restored"))}function j(){var c,d;z.connecting||z.suspend||(z.lastTick=e(),d=a.extend({},z.queue),z.queue={},y.trigger("heartbeat-send",[d]),c={data:d,interval:z.tempInterval?z.tempInterval/1e3:z.mainInterval/1e3,_nonce:"object"==typeof b.heartbeatSettings?b.heartbeatSettings.nonce:"",action:"heartbeat",screen_id:z.screenId,has_focus:z.hasFocus},z.connecting=!0,z.xhr=a.ajax({url:z.url,type:"post",timeout:3e4,data:c,dataType:"json"}).always(function(){z.connecting=!1,k()}).done(function(a,b,c){var d;return a?(i(),a.nonces_expired&&y.trigger("heartbeat-nonces-expired"),a.heartbeat_interval&&(d=a.heartbeat_interval,delete a.heartbeat_interval),y.trigger("heartbeat-tick",[a,b,c]),void(d&&t(d))):void h("empty")}).fail(function(a,b,c){h(b||"unknown",a.status),y.trigger("heartbeat-error",[a,b,c])}))}function k(){var a=e()-z.lastTick,c=z.mainInterval;z.suspend||(z.hasFocus?z.countdown>0&&z.tempInterval&&(c=z.tempInterval,z.countdown--,z.countdown<1&&(z.tempInterval=0)):c=12e4,z.minimalInterval&&c<z.minimalInterval&&(c=z.minimalInterval),b.clearTimeout(z.beatTimer),a<c?z.beatTimer=b.setTimeout(function(){j()},c-a):j())}function l(){z.hasFocus=!1}function m(){z.userActivity=e(),z.suspend=!1,z.hasFocus||(z.hasFocus=!0,k())}function n(){z.userActivityEvents=!1,y.off(".wp-heartbeat-active"),a("iframe").each(function(b,c){f(c)&&a(c.contentWindow).off(".wp-heartbeat-active")}),m()}function o(){var b=z.userActivity?e()-z.userActivity:0;b>3e5&&z.hasFocus&&l(),(z.suspendEnabled&&b>6e5||b>36e5)&&(z.suspend=!0),z.userActivityEvents||(y.on("mouseover.wp-heartbeat-active keyup.wp-heartbeat-active touchend.wp-heartbeat-active",function(){n()}),a("iframe").each(function(b,c){f(c)&&a(c.contentWindow).on("mouseover.wp-heartbeat-active keyup.wp-heartbeat-active touchend.wp-heartbeat-active",function(){n()})}),z.userActivityEvents=!0)}function p(){return z.hasFocus}function q(){return z.connectionError}function r(){z.lastTick=0,k()}function s(){z.suspendEnabled=!1}function t(a,b){var c,d=z.tempInterval?z.tempInterval:z.mainInterval;if(a){switch(a){case"fast":case 5:c=5e3;break;case 15:c=15e3;break;case 30:c=3e4;break;case 60:c=6e4;break;case 120:c=12e4;break;case"long-polling":return z.mainInterval=0,0;default:c=z.originalInterval}z.minimalInterval&&c<z.minimalInterval&&(c=z.minimalInterval),5e3===c?(b=parseInt(b,10)||30,b=b<1||b>30?30:b,z.countdown=b,z.tempInterval=c):(z.countdown=0,z.tempInterval=0,z.mainInterval=c),c!==d&&k()}return z.tempInterval?z.tempInterval/1e3:z.mainInterval/1e3}function u(a,b,c){return!!a&&((!c||!this.isQueued(a))&&(z.queue[a]=b,!0))}function v(a){if(a)return z.queue.hasOwnProperty(a)}function w(a){a&&delete z.queue[a]}function x(a){if(a)return this.isQueued(a)?z.queue[a]:c}var y=a(document),z={suspend:!1,suspendEnabled:!0,screenId:"",url:"",lastTick:0,queue:{},mainInterval:60,tempInterval:0,originalInterval:0,minimalInterval:0,countdown:0,connecting:!1,connectionError:!1,errorcount:0,hasConnected:!1,hasFocus:!0,userActivity:0,userActivityEvents:!1,checkFocusTimer:0,beatTimer:0};return d(),{hasFocus:p,connectNow:r,disableSuspend:s,interval:t,hasConnectionError:q,enqueue:u,dequeue:w,isQueued:v,getQueuedItem:x}};b.wp=b.wp||{},b.wp.heartbeat=new d}(jQuery,window);
!function(a){function b(){var b,d=a("#wp-auth-check"),f=a("#wp-auth-check-form"),g=e.find(".wp-auth-fallback-expired"),h=!1;f.length&&(a(window).on("beforeunload.wp-auth-check",function(a){a.originalEvent.returnValue=window.authcheckL10n.beforeunload}),b=a('<iframe id="wp-auth-check-frame" frameborder="0">').attr("title",g.text()),b.on("load",function(){var b,i;h=!0,f.removeClass("loading");try{i=a(this).contents().find("body"),b=i.height()}catch(j){return e.addClass("fallback"),d.css("max-height",""),f.remove(),void g.focus()}b?i&&i.hasClass("interim-login-success")?c():d.css("max-height",b+40+"px"):i&&i.length||(e.addClass("fallback"),d.css("max-height",""),f.remove(),g.focus())}).attr("src",f.data("src")),f.append(b)),a("body").addClass("modal-open"),e.removeClass("hidden"),b?(b.focus(),setTimeout(function(){h||(e.addClass("fallback"),f.remove(),g.focus())},1e4)):g.focus()}function c(){a(window).off("beforeunload.wp-auth-check"),"undefined"==typeof adminpage||"post-php"!==adminpage&&"post-new-php"!==adminpage||"undefined"==typeof wp||!wp.heartbeat||(a(document).off("heartbeat-tick.wp-auth-check"),wp.heartbeat.connectNow()),e.fadeOut(200,function(){e.addClass("hidden").css("display",""),a("#wp-auth-check-frame").remove(),a("body").removeClass("modal-open")})}function d(){var a=parseInt(window.authcheckL10n.interval,10)||180;f=(new Date).getTime()+1e3*a}var e,f;a(document).on("heartbeat-tick.wp-auth-check",function(a,f){"wp-auth-check"in f&&(d(),!f["wp-auth-check"]&&e.hasClass("hidden")?b():f["wp-auth-check"]&&!e.hasClass("hidden")&&c())}).on("heartbeat-send.wp-auth-check",function(a,b){(new Date).getTime()>f&&(b["wp-auth-check"]=!0)}).ready(function(){d(),e=a("#wp-auth-check-wrap"),e.find(".wp-auth-check-close").on("click",function(){c()})})}(jQuery);
