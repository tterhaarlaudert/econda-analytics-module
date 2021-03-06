[{if $smarty.cookies.displayedCookiesNotification != '1' && $oViewConf->oeEcondaAnalyticsShowTrackingNote() != 'no'}]
    [{oxscript include="js/libs/jquery.cookie.min.js"}]
    [{oxscript add="$.cookie('testing', 'yes'); if(!$.cookie('testing')) $('#cookieNote').hide(); else{ $('#cookieNote').show(); $.cookie('testing', null, -1);}"}]
    [{oxscript include="js/widgets/oxcookienote.min.js"}]
    <div id="cookieNote">
        <div class="alert alert-info" style="margin: 0;">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span><span class="sr-only">[{oxmultilang ident='COOKIE_NOTE_CLOSE'}]</span>
            </button>
            [{if $oViewConf->oeEcondaAnalyticsShowTrackingNote() == 'opt_in'}]
                [{oxcontent ident="oeecondaanalyticsoptin"}]
            [{/if}]
            [{if $oViewConf->oeEcondaAnalyticsShowTrackingNote() == 'opt_out'}]
                [{oxcontent ident="oeecondaanalyticsoptout"}]
            [{/if}]
        </div>
    </div>
    [{oxscript add="$('#cookieNote').oxCookieNote();"}]
    [{oxscript include=$oViewConf->getModuleUrl("oeecondaanalytics", "out/js/oeecondaanalytics.js")}]
[{/if}]
[{oxscript widget=$oView->getClassName()}]
