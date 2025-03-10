<!-- slider -->
{{--@if(isset($contentDetails['slider']))--}}
{{--    <div class="skitter-large-box">--}}
{{--        <div class="skitter skitter-large with-dots">--}}
{{--            <ul>--}}
{{--                @foreach($contentDetails['slider'] as $data)--}}
{{--                    <li>--}}
{{--                        <a href="{{optional($data->content->contentMedia->description)->button_link}}">--}}
{{--                            <img--}}
{{--                                src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}"--}}
{{--                                class="downBars"--}}
{{--                            />--}}
{{--                        </a>--}}
{{--                        <div class="label_text">--}}
{{--                            <h2>{{optional($data->description)->name}}</h2>--}}
{{--                            <p class="mb-4">--}}
{{--                                {{optional($data->description)->short_description}}--}}
{{--                            </p>--}}
{{--                            <a href="{{optional($data->content->contentMedia->description)->button_link}}">--}}
{{--                                <button class="btn-custom"> {{optional($data->description)->button_name}}</button>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}


<div class="skitter-large-box">
    <div class="skitter skitter-large with-dots">
        <ul>
            <li>
                <a href="#">
                    <img
                        src="https://onlinebetting.xyz/wp-content/uploads/2017/03/Football-slider-1030x350.jpg"
                        class="downBars"
                    />
                </a>
                <div class="label_text">
                    <h2 style="color: red;">{{strtoupper('Bet smarter, Not Harder.')}}</h2>
                    {{--                    <p class="mb-4">--}}
                    {{--                        sdfsdf--}}
                    {{--                    </p>--}}
                    <a href="">
                        {{--                        <button class="btn-custom"> sadsda</button>--}}
                    </a>
                </div>
            </li>

            <li>
                <a href="#">
                    <img
                        src="https://transplantepi.org/wp-content/uploads/2022/07/cropped-header.jpg"
                        class="downBars"
                    />
                </a>
                <div class="label_text">
                    <h2 style="color: yellow;">{{strtoupper('Best Live Casino')}}</h2>
                    {{--                    <p class="mb-4">--}}
                    {{--                        sdfsdf--}}
                    {{--                    </p>--}}
                    <a href="">
                        {{--                        <button class="btn-custom"> sadsda</button>--}}
                    </a>
                </div>
            </li>

            <li>
                <a href="#">
                    <img
                        src="https://www.cnewrestoration.in/wp-content/uploads/2023/10/play-the-best-casino-games-and-bet-on-sports-at-indibet_b517113af.jpg"
                        class="downBars"
                    />
                </a>
                <div class="label_text">
                    <h2>{{strtoupper('Money win at online slots')}}</h2>
                    {{--                    <p class="mb-4">--}}
                    {{--                        sdfsdf--}}
                    {{--                    </p>--}}
                    <a href="">
                        {{--                        <button class="btn-custom"> sadsda</button>--}}
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
