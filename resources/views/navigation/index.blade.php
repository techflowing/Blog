<!DOCTYPE html>
<html lang="zh">

@include('navigation.layouts.header')

<body class="page-body">
    <!-- skin-white -->
    <div class="page-container">

        @include('navigation.layouts.sidebar')

        <div class="main-content">
            <nav class="navbar user-info-navbar" role="navigation">
                <!-- User Info, Notifications and Menu Bar -->
                <!-- Left links for user info navbar -->
                <ul class="user-info-menu left-links list-inline list-unstyled">
                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            @include('navigation.layouts.content')

            @include('navigation.layouts.footer')

        </div>
    </div>
    <!-- 锚点平滑移动 -->
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.has-sub', function(){
            var _this = $(this)
            if(!$(this).hasClass('expanded')) {
               setTimeout(function(){
                    _this.find('ul').attr("style","")
               }, 300);

            } else {
                $('.has-sub ul').each(function(id,ele){
                    var _that = $(this)
                    if(_this.find('ul')[0] != ele) {
                        setTimeout(function(){
                            _that.attr("style","")
                        }, 300);
                    }
                })
            }
        })
        $('.user-info-menu .hidden-sm').click(function(){
            if($('.sidebar-menu').hasClass('collapsed')) {
                $('.has-sub.expanded > ul').attr("style","")
            } else {
                $('.has-sub.expanded > ul').show()
            }
        })
        $("#main-menu li ul li").click(function() {
            $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
            $(this).addClass('active'); // 添加当前元素的样式
        });
        $("a.smooth").click(function(ev) {
            ev.preventDefault();

            public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
            ps_destroy();
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top - 30
            }, {
                duration: 500,
                easing: "swing"
            });
        });
        return false;
    });

    var href = "";
    var pos = 0;
    $("a.smooth").click(function(e) {
        $("#main-menu li").each(function() {
            $(this).removeClass("active");
        });
        $(this).parent("li").addClass("active");
        e.preventDefault();
        href = $(this).attr("href");
        pos = $(href).position().top - 30;
    });
    </script>
</body>

</html>
