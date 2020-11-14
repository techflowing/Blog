@extends('tpl-page')

@include('navigation.header')

@section('content')
    <div class="page-container">

        @include('navigation.sidebar')

        <div class="main-content">

            <div class="navigation-content">
                @include('navigation.content')
            </div>

            <div class="navigation-footer-container">
                @include('tpl-footer')
            </div>

        </div>
    </div>
    <!-- 锚点平滑移动 -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.has-sub', function () {
                var _this = $(this);
                if (!$(this).hasClass('expanded')) {
                    setTimeout(function () {
                        _this.find('ul').attr("style", "")
                    }, 300);

                } else {
                    $('.has-sub ul').each(function (id, ele) {
                        var _that = $(this);
                        if (_this.find('ul')[0] != ele) {
                            setTimeout(function () {
                                _that.attr("style", "")
                            }, 300);
                        }
                    })
                }
            });
            $('.user-info-menu .hidden-sm').click(function () {
                if ($('.sidebar-menu').hasClass('collapsed')) {
                    $('.has-sub.expanded > ul').attr("style", "")
                } else {
                    $('.has-sub.expanded > ul').show()
                }
            });
            $("#main-menu li ul li").click(function () {
                $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
                $(this).addClass('active'); // 添加当前元素的样式
            });
            $("a.smooth").click(function (ev) {
                ev.preventDefault();

                public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
                ps_destroy();

                $(".page-content").animate({
                    scrollTop: $($(this).attr("href")).offset().top - $(".main-content").offset().top - 10
                }, {
                    duration: 500,
                    easing: "swing"
                });
            });
            return false;
        });

        var href = "";
        var pos = 0;
        $("a.smooth").click(function (e) {
            $("#main-menu li").each(function () {
                $(this).removeClass("active");
            });
            $(this).parent("li").addClass("active");
            e.preventDefault();
            href = $(this).attr("href");
            pos = $(href).position().top - 30;
        });
    </script>
@endsection
