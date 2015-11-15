<?php
/**
 * Шаблон плеера
 */
\common\components\widgets\player\assets\PlayerAssets::register($this);
?>
<script type="text/javascript">
    $(document).ready(function(){
        var loading = $("#loading");
        $(document).on('pjax:send', function() {
            loading.show();
        });
        $(document).on('pjax:complete', function() {
            loading.hide();
        })

       var playerPlayList = new jPlayerPlaylist({
            jPlayer: "#jquery_jplayer_1",
            cssSelectorAncestor: "#jp_container_1"
        },{

       }, {
            swfPath: "js",
            supplied: "oga, mp3",
            wmode: "window",
            loop: true,
        });

        $(".jp-sh-playlist").on('click', function(){
            var playList = $('.jp-playlist');
            if(playList.is(":visible")){
                playList.hide('slide');
            }else{
                playList.show('blind', null, 1000);
            }
        });

        $('body').on('click','.jp-sound-play', function(){
            var title = $(this).html();
            var url = $(this).attr('data-url');
            if(url && title){
                var jplayer = $(".jplayer");
                if(jplayer && !jplayer.is(':visible')){
                    jplayer.show();
                }
                var playlist = playerPlayList.playlist;
                var index;
                $.each(playlist, function(i, v){
                    if(v.title && v.title == title){
                        index = i;
                    }
                });
                if($.isNumeric(index)){
                    playerPlayList.play(index);
                }else{
                    playerPlayList.add({
                        title: title,
                        mp3: url,
                    }, true);
                }
            }
        });
    });
    //]]>
</script>
<div class="jplayer" style="display: none">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div id="jp_container_1" class="jp-audio">
        <div class="jp-type-playlist">
            <div class="jp-playlist" style="display: none">
                <ul>
                    <li></li>
                </ul>
            </div>
            <div class="jp-gui jp-interface">

                <div class="jp-controls">
                    <a href="javascript:;" class="jp-play" tabindex="1">play</a>
                    <a href="javascript:;" class="jp-pause" tabindex="1">pause</a>
                    <a href="javascript:;" class="jp-previous" tabindex="1">p</a>
                    <a href="javascript:;" class="jp-next" tabindex="1">n</a>
                    <a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a>
                    <a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>
                </div>


                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
                <a href="javascript:;" class="jp-sh-playlist">s/h</a>
                <div class="jp-time-holder">
                    <div class="jp-current-time"></div>
                </div>

            </div>
        </div>
    </div><!-- .jp-audio -->

</div>

