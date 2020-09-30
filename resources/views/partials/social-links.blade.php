
<div class="buttons-social-media-share">
    <ul class="share-buttons">
        <li>
            <a href="https://www.facebook.com/sharer.php?u={{request()->fullUrl()}}" title="Compartir en Facebook" target="_blank">
                <img alt="Compartir en Facebook" src="/img/flat_web_icon_set/Facebook.png">
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$description}}" target="_blank" title="Tweet">
                <img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png">
            </a>
        </li>
{{--        <li>--}}
{{--            <a href="https://plus.google.com/share?url={{ request()->fullUrl()}}" target="_blank" title="Share on Google+">--}}
{{--                <img alt="Compartir en Google+" src="/img/flat_web_icon_set/Google+.png">--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{request()->fullUrl()}}" target="_blank" title="Linkedin">
                <img alt="Mi linkedIn" src="/img/flat_web_icon_set/LinkedIn.png">
            </a>
        </li>
    </ul>
</div>
