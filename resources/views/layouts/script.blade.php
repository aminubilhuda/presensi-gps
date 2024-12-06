<!-- Jquery -->
    <script src="{{asset ('assetsk/js/lib/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap-->
    {{-- <script src="{{asset ('assetsk/js/lib/popper.min.js')}}"></script> --}}
    {{-- <script src="{{asset ('assetsk/js/lib/bootstrap.min.js')}}"></script> --}}
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    {{-- <script src="{{asset ('assetsk/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script> --}}
    <!-- jQuery Circle Progress -->
    {{-- <script src="{{asset ('assetsk/js/plugins/jquery-circle-progress/circle-progress.min.js')}}"></script> --}}
    {{-- <script src="https://cdn.amcharts.com/lib/4/core.js"></script> --}}
    {{-- <script src="https://cdn.amcharts.com/lib/4/charts.js"></script> --}}
    {{-- <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script> --}}
    {{-- webcam --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Base Js File -->
    <script src="{{asset ('assetsk/js/base.js')}}"></script>

    <script>
        am4core.ready(function () {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Hadir",
                    litres: 501.9
                },
                {
                    country: "Sakit",
                    litres: 301.9
                },
                {
                    country: "Izin",
                    litres: 201.1
                },
                {
                    country: "Terlambat",
                    litres: 165.8
                },
            ];



            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";
            series.alignLabels = false;
            series.labels.template.text = "{value.percent.formatNumber('#.0')}%";
            series.labels.template.radius = am4core.percent(-40);
            series.labels.template.fill = am4core.color("white");
            series.colors.list = [
                am4core.color("#1171ba"),
                am4core.color("#fca903"),
                am4core.color("#37db63"),
                am4core.color("#ba113b"),
            ];
        }); // end am4core.ready()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update check-in and check-out times
        // function updateTimes() {
        //     const now = new Date();
        //     document.getElementById('checkInTime').textContent = now.toLocaleTimeString();
        //     document.getElementById('checkOutTime').textContent = now.toLocaleTimeString();
        // }

        // Simulate real-time updates
        // setInterval(updateTimes, 1000);

        // Add hover effects to menu items
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('mouseover', () => {
                item.querySelector('.menu-icon').style.transform = 'scale(1.1)';
            });
            item.addEventListener('mouseout', () => {
                item.querySelector('.menu-icon').style.transform = 'scale(1)';
            });
        });

        // Add active class to bottom nav items on click
        document.querySelectorAll('.bottom-nav .nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                document.querySelector('.bottom-nav .nav-link.active').classList.remove('active');
                link.classList.add('active');
            });
        });
    </script>
    @stack('myscrip')