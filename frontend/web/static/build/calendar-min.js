define("bui/calendar",["bui/common","jquery","bui/picker","bui/overlay","bui/list","bui/data","bui/toolbar"],function(e,t,a){var n=e("bui/common"),i=n.namespace("Calendar");n.mix(i,{Calendar:e("bui/calendar/calendar"),MonthPicker:e("bui/calendar/monthpicker"),DatePicker:e("bui/calendar/datepicker"),Resource:e("bui/calendar/resource")}),a.exports=i}),define("bui/calendar/calendar",["bui/common","jquery","bui/picker","bui/overlay","bui/list","bui/data","bui/toolbar"],function(e,t,a){function n(){var e=new Date;return new Date(e.getFullYear(),e.getMonth(),e.getDate())}function i(e){return 10>e?"0"+e:e.toString()}function r(e){for(var t=[],a=0;e>a;a++)t.push({text:i(a),value:i(a)});return t}function s(e,t,a){var n=e.get("el").find("."+t);c.isNumber(a)&&(a=i(a)),n.val(a)}var c=e("bui/common"),l=c.prefix,o="x-datepicker-time",u="x-datepicker-hour",d="x-datepicker-minute",h="x-datepicker-second",g="x-timepicker",m=e("bui/picker").ListPicker,p=e("bui/calendar/monthpicker"),v=e("bui/calendar/header"),f=e("bui/calendar/panel"),y=e("bui/toolbar"),b=c.Component,k=c.Date,x=e("bui/calendar/resource"),D=b.Controller.extend({initializer:function(){var e=this,t=e.get("children"),a=new v,n=new f,i=e.get("footer")||e._createFooter();t.push(a),t.push(n),t.push(i),e.set("header",a),e.set("panel",n),e.set("footer",i)},renderUI:function(){var e=this,t=e.get("children");if(e.get("showTime")){var a=e.get("timepicker")||e._initTimePicker();t.push(a),e.set("timepicker",a)}},bindUI:function(){var e=this,t=e.get("header"),a=e.get("panel");a.on("selectedchange",function(t){var a=t.date;k.isDateEquals(a,e.get("selectedDate"))||e.set("selectedDate",a)}),e.get("showTime")?e._initTimePickerEvent():a.on("click",function(){e.fire("accept")}),t.on("monthchange",function(t){e._setYearMonth(t.year,t.month)}),t.on("headerclick",function(){var a=e.get("monthpicker")||e._createMonthPicker();a.set("year",t.get("year")),a.set("month",t.get("month")),a.show()})},_initTimePicker:function(){var e=this,t=e.get("lockTime"),a={hour:u,minute:d,second:h};if(t)for(var n in t){var i=a[n.toLowerCase()];e.set(n,t[n]),t.editable||e.get("el").find("."+i).attr("disabled","")}var r=new m({elCls:g,children:[{itemTpl:'<li><a href="#">{text}</a></li>'}],autoAlign:!1,align:{node:e.get("el").find(".bui-calendar-footer"),points:["tl","bl"],offset:[-1,1]},trigger:e.get("el").find("."+o)});return r.render(),e._initTimePickerEvent(r),r},_initTimePickerEvent:function(e){var t=this,e=t.get("timepicker");e&&(e.get("el").delegate("a","click",function(e){e.preventDefault()}),e.on("triggerchange",function(t){var a=t.curTrigger;a.hasClass(u)?e.get("list").set("items",r(24)):e.get("list").set("items",r(60))}),e.on("selectedchange",function(e){var a=e.curTrigger,n=e.value;a.hasClass(u)?t.setInternal("hour",n):a.hasClass(d)?t.setInternal("minute",n):t.setInternal("second",n)}))},_setYearMonth:function(e,t){var a=this,n=a.get("selectedDate"),i=n.getDate();if(e!==n.getFullYear()||t!==n.getMonth()){var r=new Date(e,t,i);r.getMonth()!=t&&(r=k.addDay(-1,new Date(e,t+1))),a.set("selectedDate",r)}},_createMonthPicker:function(){var e,t=this;return e=new p({render:t.get("el"),effect:{effect:"slide",duration:300},visibleMode:"display",success:function(){var e=this;t._setYearMonth(e.get("year"),e.get("month")),e.hide()},cancel:function(){this.hide()}}),t.set("monthpicker",e),t.get("children").push(e),e},_createFooter:function(){var e=this,t=this.get("showTime"),a=[];return t?(a.push({content:e.get("timeTpl")}),a.push({xclass:"bar-item-button",text:x.submit,btnCls:"button button-small button-primary",listeners:{click:function(){e.fire("accept")}}})):(a.push({xclass:"bar-item-button",text:x.today,btnCls:"button button-small",id:"todayBtn",listeners:{click:function(){var t=n();e.set("selectedDate",t),e.fire("accept")}}}),a.push({xclass:"bar-item-button",text:x.clean,btnCls:"button button-small",id:"clsBtn",listeners:{click:function(){e.fire("clear")}}})),new y.Bar({elCls:l+"calendar-footer",children:a})},_updateTodayBtnAble:function(){var e=this;if(!e.get("showTime")){var t=e.get("footer"),a=e.get("panel").get("view"),i=n(),r=t.getItem("todayBtn");a._isInRange(i)?r.enable():r.disable()}},_uiSetSelectedDate:function(e){var t=this,a=e.getFullYear(),n=e.getMonth();t.get("header").setMonth(a,n),t.get("panel").set("selected",e),t.fire("datechange",{date:e})},_uiSetHour:function(e){s(this,u,e)},_uiSetMinute:function(e){s(this,d,e)},_uiSetSecond:function(e){s(this,h,e)},_uiSetMaxDate:function(e){var t=this;t.get("panel").set("maxDate",e),t._updateTodayBtnAble()},_uiSetMinDate:function(e){var t=this;t.get("panel").set("minDate",e),t._updateTodayBtnAble()}},{ATTRS:{header:{},panel:{},maxDate:{},minDate:{},monthPicker:{},timepicker:{},width:{value:180},events:{value:{click:!1,accept:!1,datechange:!1,monthchange:!1}},showTime:{value:!1},lockTime:{},timeTpl:{value:'<input type="text" readonly class="'+o+" "+u+'" />:<input type="text" readonly class="'+o+" "+d+'" />:<input type="text" readonly class="'+o+" "+h+'" />'},selectedDate:{value:n()},hour:{value:(new Date).getHours()},minute:{value:(new Date).getMinutes()},second:{value:0}}},{xclass:"calendar",priority:0});a.exports=D}),define("bui/calendar/monthpicker",["jquery","bui/common","bui/overlay","bui/list","bui/data","bui/toolbar"],function(e,t,a){function n(){return i.map(m.months,function(e,t){return{text:e,value:t}})}var i=e("jquery"),r=e("bui/common"),s=(r.Component,e("bui/overlay").Overlay),c=e("bui/list").SimpleList,l=e("bui/toolbar"),o=r.prefix,u="x-monthpicker-month",d="x-monthpicker-year",h="x-monthpicker-yearnav",g="x-monthpicker-item",m=e("bui/calendar/resource"),p=c.extend({bindUI:function(){var e=this;e.get("el").delegate("a","click",function(e){e.preventDefault()}).delegate("."+u,"dblclick",function(){e.fire("monthdblclick")})}},{ATTRS:{itemTpl:{view:!0,value:'<li class="'+g+' x-monthpicker-month"><a href="#" hidefocus="on">{text}</a></li>'},itemCls:{value:g},items:{view:!0,valueFn:function(){return n()}},elCls:{view:!0,value:"x-monthpicker-months"}}},{xclass:"calendar-month-panel"}),v=c.extend({bindUI:function(){var e=this,t=e.get("el");t.delegate("a","click",function(e){e.preventDefault()}),t.delegate("."+d,"dblclick",function(){e.fire("yeardblclick")}),t.delegate(".x-icon","click",function(t){var a=i(t.currentTarget);a.hasClass(h+"-prev")?e._prevPage():a.hasClass(h+"-next")&&e._nextPage()}),e.on("itemselected",function(t){t.item&&e.setInternal("year",t.item.value)})},_prevPage:function(){var e=this,t=e.get("start"),a=e.get("yearCount");e.set("start",t-a)},_nextPage:function(){var e=this,t=e.get("start"),a=e.get("yearCount");e.set("start",t+a)},_uiSetStart:function(){var e=this;e._setYearsContent()},_uiSetYear:function(e){var t=this,a=t.findItemByField("value",e);a?t.setSelectedByField(e):t.set("start",e)},_setYearsContent:function(){for(var e=this,t=e.get("year"),a=e.get("start"),n=e.get("yearCount"),i=[],r=a;a+n>r;r++){var s=r.toString();i.push({text:s,value:r})}e.set("items",i),e.setSelectedByField(t)}},{ATTRS:{items:{view:!0,value:[]},elCls:{view:!0,value:"x-monthpicker-years"},itemCls:{value:g},year:{},start:{value:(new Date).getFullYear()},yearCount:{value:10},itemTpl:{view:!0,value:'<li class="'+g+" "+d+'"><a href="#" hidefocus="on">{text}</a></li>'},tpl:{view:!0,value:'<div class="'+h+'"><span class="'+h+'-prev x-icon x-icon-normal x-icon-small"><span class="icon icon-caret icon-caret-left"></span></span><span class="'+h+'-next x-icon x-icon-normal x-icon-small"><span class="icon icon-caret icon-caret-right"></span></span></div><ul></ul>'}}},{xclass:"calendar-year-panel"}),f=s.extend({initializer:function(){var e=this,t=e.get("children"),a=new p,n=new v,i=e._createFooter();t.push(a),t.push(n),t.push(i),e.set("yearPanel",n),e.set("monthPanel",a)},bindUI:function(){var e=this;e.get("monthPanel").on("itemselected",function(t){t.item&&e.setInternal("month",t.item.value)}).on("monthdblclick",function(){e._successCall()}),e.get("yearPanel").on("itemselected",function(t){t.item&&e.setInternal("year",t.item.value)}).on("yeardblclick",function(){e._successCall()})},_successCall:function(){var e=this,t=e.get("success");t&&t.call(e)},_createFooter:function(){var e=this;return new l.Bar({elCls:o+"clear x-monthpicker-footer",children:[{xclass:"bar-item-button",text:m.submit,btnCls:"button button-small button-primary",handler:function(){e._successCall()}},{xclass:"bar-item-button",text:m.cancel,btnCls:"button button-small last",handler:function(){var t=e.get("cancel");t&&t.call(e)}}]})},_uiSetYear:function(e){this.get("yearPanel").set("year",e)},_uiSetMonth:function(e){this.get("monthPanel").setSelectedByField(e)}},{ATTRS:{footer:{},align:{value:{}},year:{},success:{value:function(){}},cancel:{value:function(){}},width:{value:180},month:{},yearPanel:{},monthPanel:{}}},{xclass:"monthpicker"});a.exports=f}),define("bui/calendar/resource",["bui/common","jquery"],function(e,t,a){var n=e("bui/common"),i={"zh-CN":{yearMonthMask:"yyyy \u5e74 mm \u6708",months:["\u4e00\u6708","\u4e8c\u6708","\u4e09\u6708","\u56db\u6708","\u4e94\u6708","\u516d\u6708","\u4e03\u6708","\u516b\u6708","\u4e5d\u6708","\u5341\u6708","\u5341\u4e00\u6708","\u5341\u4e8c\u6708"],weekDays:["\u65e5","\u4e00","\u4e8c","\u4e09","\u56db","\u4e94","\u516d"],today:"\u4eca\u5929",clean:"\u6e05\u9664",submit:"\u786e\u5b9a",cancel:"\u53d6\u6d88"},en:{yearMonthMask:"MMM yyyy",months:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],weekDays:["Su","Mo","Tu","We","Th","Fr","Sa"],today:"today",clean:"clean",submit:"submit",cancel:"cancel"},setLanguage:function(e){i[e]&&n.mix(this,i[e])}};i.setLanguage("zh-CN"),a.exports=i}),define("bui/calendar/header",["jquery","bui/common"],function(e,t,a){var n=e("jquery"),i=e("bui/common"),r=i.prefix,s=i.Component,c="x-datepicker-arrow",l="x-datepicker-prev",o="x-datepicker-next",u=e("bui/calendar/resource"),d=i.Date,h=s.Controller.extend({bindUI:function(){var e=this,t=e.get("el");t.delegate("."+c,"click",function(t){t.preventDefault();var a=n(t.currentTarget);a.hasClass(o)?e.nextMonth():a.hasClass(l)&&e.prevMonth()}),t.delegate(".x-datepicker-month","click",function(){e.fire("headerclick")})},setMonth:function(e,t){var a=this,n=a.get("year"),i=a.get("month");(e!==n||t!==i)&&(a.set("year",e),a.set("month",t),a.fire("monthchange",{year:e,month:t}))},nextMonth:function(){var e=this,t=new Date(e.get("year"),e.get("month")+1);e.setMonth(t.getFullYear(),t.getMonth())},prevMonth:function(){var e=this,t=new Date(e.get("year"),e.get("month")-1);e.setMonth(t.getFullYear(),t.getMonth())},_uiSetYear:function(e){var t=this,a=t.get("month");isNaN(a)||t._setYearMonth(e,a)},_uiSetMonth:function(e){var t=this,a=t.get("year");isNaN(a)||t._setYearMonth(a,e)},_setYearMonth:function(e,t){var a=this,n=new Date(e,t),i=d.format(n,u.yearMonthMask);if(-1!==i.indexOf("000")){var s=u.months;i=i.replace("000",s[t])}a.get("el").find("."+r+"year-month-text").html(i)}},{ATTRS:{year:{sync:!0},month:{sync:!0,setter:function(e){this.set("monthText",e+1)}},monthText:{},tpl:{view:!0,valueFn:function(){return'<div class="'+c+" "+l+'"><span class="icon icon-white icon-caret  icon-caret-left"></span></div><div class="x-datepicker-month"><div class="month-text-container"><span class="'+r+'year-month-text "></span><span class="'+r+"caret "+r+'caret-down"></span></div></div><div class="'+c+" "+o+'"><span class="icon icon-white icon-caret  icon-caret-right"></span></div>'}},elCls:{view:!0,value:"x-datepicker-header"},events:{value:{monthchange:!0}}}},{xclass:"calendar-header"});a.exports=h}),define("bui/calendar/panel",["jquery","bui/common"],function(e,t,a){var n=e("jquery"),i=e("bui/common"),r=i.Component,s=i.Date,c="x-datepicker-date",l="x-datepicker-today",o="x-datepicker-disabled",u="isoDate",d="x-datepicker-selected",h=6,g={deactive:"prevday",active:"active",disabled:"disabled"},m=e("bui/calendar/resource"),p=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],v=r.View.extend({renderUI:function(){this.updatePanel()},updatePanel:function(){var e=this,t=e.get("el"),a=t.find("tbody"),i=e._getPanelInnerTpl();a.empty(),n(i).appendTo(a)},_getPanelInnerTpl:function(){for(var e=this,t=e._getFirstDate(),a=[],n=0;h>n;n++){var i=s.addWeek(n,t);a.push(e._getWeekTpl(i))}return a.join("")},_getWeekTpl:function(e){for(var t=this,a=t.get("weekTpl"),n=[],r=0;r<p.length;r++){var c=s.addDay(r,e);n.push(t._getDayTpl(c))}return i.substitute(a,{daysTpl:n.join("")})},_getDayTpl:function(e){var t=this,a=t.get("dayTpl"),n=e.getDay(),r=t._isToday(e)?l:"",c=p[n],o=e.getDate(),d=t._isInRange(e)?t._isCurrentMonth(e)?g.active:g.deactive:g.disabled;return i.substitute(a,{dayOfWeek:c,dateType:d,dateNumber:o,todayCls:r,date:s.format(e,u)})},_getFirstDate:function(e,t){var a=this,n=a._getMonthFirstDate(e,t),i=n.getDay();return s.addDay(-1*i,n)},_getMonthFirstDate:function(e,t){var a=this,e=e||a.get("year"),t=t||a.get("month");return new Date(e,t)},_isCurrentMonth:function(e){return e.getMonth()===this.get("month")},_isToday:function(e){var t=new Date;return t.getFullYear()===e.getFullYear()&&t.getMonth()===e.getMonth()&&t.getDate()===e.getDate()},_isInRange:function(e){var t=this,a=t.get("maxDate"),n=t.get("minDate");return n&&n>e?!1:a&&e>a?!1:!0},_clearSelectedDate:function(){var e=this;e.get("el").find("."+d).removeClass(d)},_findDateElement:function(e){var t=this,a=s.format(e,u),i=t.get("el").find("."+c),r=null;return a&&i.each(function(e,t){return n(t).attr("title")===a?(r=n(t),!1):void 0}),r},_setSelectedDate:function(e){var t=this,a=t._findDateElement(e);t._clearSelectedDate(),a&&a.addClass(d)}},{ATTRS:{}}),f=r.Controller.extend({initializer:function(){var e=this,t=new Date;e.get("year")||e.set("year",t.getFullYear()),e.get("month")||e.set("month",t.getMonth())},bindUI:function(){var e=this,t=e.get("el");t.delegate("."+c,"click",function(e){e.preventDefault()}),t.delegate("."+o,"mouseup",function(e){e.stopPropagation()})},performActionInternal:function(e){var t=this,a=n(e.target).closest("."+c);if(a){var i=a.attr("title");i&&(i=s.parse(i),t.get("view")._isInRange(i)&&t.set("selected",i))}},setMonth:function(e,t){var a=this,n=a.get("year"),i=a.get("month");(e!==n||t!==i)&&(a.set("year",e),a.set("month",t),a.get("view").updatePanel())},_uiSetSelected:function(e,t){var a=this;t&&t.prevVal&&s.isDateEquals(e,t.prevVal)||(a.setMonth(e.getFullYear(),e.getMonth()),a.get("view")._setSelectedDate(e),a.fire("selectedchange",{date:e}))},_uiSetMaxDate:function(e){e&&this.get("view").updatePanel()},_uiSetMinDate:function(e){e&&this.get("view").updatePanel()}},{ATTRS:{year:{view:!0},month:{view:!0},selected:{},focusable:{value:!0},dayTpl:{view:!0,value:'<td class="x-datepicker-date x-datepicker-{dateType} {todayCls} day-{dayOfWeek}" title="{date}"><a href="#" hidefocus="on" tabindex="1"><em><span>{dateNumber}</span></em></a></td>'},events:{value:{click:!1,selectedchange:!0}},maxDate:{view:!0,setter:function(e){return e?i.isString(e)?s.parse(e):e:void 0}},minDate:{view:!0,setter:function(e){return e?i.isString(e)?s.parse(e):e:void 0}},weekTpl:{view:!0,value:"<tr>{daysTpl}</tr>"},tpl:{view:!0,valueFn:function(){return'<table class="x-datepicker-inner" cellspacing="0"><thead><tr><th  title="Sunday"><span>'+m.weekDays[0]+'</span></th><th  title="Monday"><span>'+m.weekDays[1]+'</span></th><th  title="Tuesday"><span>'+m.weekDays[2]+'</span></th><th  title="Wednesday"><span>'+m.weekDays[3]+'</span></th><th  title="Thursday"><span>'+m.weekDays[4]+'</span></th><th  title="Friday"><span>'+m.weekDays[5]+'</span></th><th  title="Saturday"><span>'+m.weekDays[6]+'</span></th></tr></thead><tbody class="x-datepicker-body"></tbody></table>'}},xview:{value:v}}},{xclass:"calendar-panel",priority:0});a.exports=f}),define("bui/calendar/datepicker",["bui/common","jquery","bui/picker","bui/overlay","bui/list","bui/data","bui/toolbar"],function(e,t,a){var n=e("bui/common"),i=e("bui/picker").Picker,r=e("bui/calendar/calendar"),s=n.Date,c=i.extend({initializer:function(){},createControl:function(){var e=this,t=e.get("children"),a=new r({render:e.get("el"),showTime:e.get("showTime"),lockTime:e.get("lockTime"),minDate:e.get("minDate"),maxDate:e.get("maxDate"),autoRender:!0});return a.on("clear",function(){var t=e.get("curTrigger"),a=t.val();a&&(t.val(""),t.trigger("change"))}),e.get("dateMask")||(e.get("showTime")?e.set("dateMask","yyyy-mm-dd HH:MM:ss"):e.set("dateMask","yyyy-mm-dd")),t.push(a),e.set("calendar",a),a},setSelectedValue:function(e){if(this.get("calendar")){var t=this,a=this.get("calendar"),n=s.parse(e,t.get("dateMask"));if(n=n||t.get("selectedDate"),a.set("selectedDate",s.getDate(n)),t.get("showTime")){var i=this.get("lockTime"),r=n.getHours(),c=n.getMinutes(),l=n.getSeconds();i&&(e&&i.editable||(r=null!=i.hour?i.hour:r,c=null!=i.minute?i.minute:c,l=null!=i.second?i.second:l)),a.set("hour",r),a.set("minute",c),a.set("second",l)}}},getSelectedValue:function(){if(!this.get("calendar"))return null;var e=this,t=e.get("calendar"),a=s.getDate(t.get("selectedDate"));return e.get("showTime")&&(a=s.addHour(t.get("hour"),a),a=s.addMinute(t.get("minute"),a),a=s.addSecond(t.get("second"),a)),a},getSelectedText:function(){return this.get("calendar")?s.format(this.getSelectedValue(),this._getFormatType()):""},_getFormatType:function(){return this.get("dateMask")},_uiSetMaxDate:function(e){if(!this.get("calendar"))return null;var t=this;t.get("calendar").set("maxDate",e)},_uiSetMinDate:function(e){if(!this.get("calendar"))return null;var t=this;t.get("calendar").set("minDate",e)}},{ATTRS:{showTime:{value:!1},lockTime:{},maxDate:{},minDate:{},dateMask:{},changeEvent:{value:"accept"},hideEvent:{value:"accept clear"},calendar:{},selectedDate:{value:new Date((new Date).setSeconds(0))}}},{xclass:"datepicker",priority:0});a.exports=c});