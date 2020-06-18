@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('about.header')

{{--页面Content--}}
@section('content')
    <div class="page-container">
        <div class="col-sm-10 col-lg-10 col-sm-offset-1 about-container">
            <div class="col-sm-9 about-container-left">

                <div class="about-me">
                    <p class="about-item-title">关于我</p>

                    <p style="margin-top: 15px">一条啥都不会还不想学习的咸鱼，等待翻身</p>
                </div>

                <div class="about-site">
                    <p class="about-item-title">关于本站</p>

                    <p style="margin-top: 15px">待更新</p>

                </div>

                @include('tpl-footer')

            </div>

            <div class="col-sm-3 col-lg-3">
                <div class="user-profile ">
                    @php
                        $weChat = config('user_wechat','/static-common/img/logo.png');
                        $gitHub = config('user_github','');
                        $email = config('user_email','');
                        if (!empty($email)){
                            $email = "mailto:".$email;
                        }
                    @endphp
                    <img class="about-wechat-img" src="{{$weChat}}">
                    <p class="about-contact-me-text">微信扫码联系我</p>
                    <div class="about-contact-me-more">
                        <div class="about-contact-me-more-item">
                            <a href="{{$gitHub}}" target="_blank" title="GitHub">
                                <img class="about-contact-me-more-item-icon" src="{{asset('/static-common/img/github.png')}}">
                            </a>
                        </div>
                        <div class="about-contact-me-more-item">
                            <a href="{{$email}}" title="Email">
                                <img class="about-contact-me-more-item-icon" src="{{asset('/static-common/img/email.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                @isset($accessData)
                    <div class="access-statistic-detail">
                        <p class="about-item-title access-statistic-detail-title">访问统计</p>
                        @foreach($accessData as $item)
                            <div class="access-statistic-item">
                                <p class="access-statistic-item-name">{{$item->name}}</p>
                                <div class="access-statistic-item-pv">
                                    <p class="access-statistic-name">访问总次数</p>
                                    <p class="access-statistic-pv">{{$item->pv}}</p>
                                </div>
                                <div class="access-statistic-item-uv">
                                    <p class="access-statistic-name">访问总人数</p>
                                    <p class="access-statistic-uv">{{$item->uv}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection
