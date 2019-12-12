<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>همپا | دانش آموز</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/student/dashboard/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Animation library for notifications   -->
    <link href="{{asset('css/student/dashboard/animate.min.css')}}" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->

    <link href="{{asset('css/student/dashboard/dashboard.css')}}" rel="stylesheet"/>
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
    <!--  CSS for Demo Purpose, dont include it in your project     -->
    <link href="{{asset('css/student/dashboard/demo.css')}}" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
    <!--     datePicker     -->


    @yield('style')

    <style>

        .sidebar .nav p {

            margin-left: 15px;
        }

        @-webkit-keyframes poppy {
            0% {
                -webkit-transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
                transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
            }
            3.4% {
                -webkit-transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
                transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
            }
            4.3% {
                -webkit-transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
                transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
            }
            4.7% {
                -webkit-transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
                transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
            }
            6.81% {
                -webkit-transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
                transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
            }
            8.61% {
                -webkit-transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
                transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
            }
            9.41% {
                -webkit-transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
                transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
            }
            10.21% {
                -webkit-transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
                transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
            }
            12.91% {
                -webkit-transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
                transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
            }
            13.61% {
                -webkit-transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
                transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
            }
            14.11% {
                -webkit-transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
                transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
            }
            17.22% {
                -webkit-transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
                transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
            }
            17.52% {
                -webkit-transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
                transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
            }
            18.72% {
                -webkit-transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
                transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
            }
            21.32% {
                -webkit-transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
                transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
            }
            24.32% {
                -webkit-transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
                transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
            }
            25.23% {
                -webkit-transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
                transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
            }
            28.33% {
                -webkit-transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
                transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
            }
            29.03% {
                -webkit-transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
                transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
            }
            29.93% {
                -webkit-transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
                transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
            }
            35.54% {
                -webkit-transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
                transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
            }
            36.74% {
                -webkit-transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
                transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
            }
            39.44% {
                -webkit-transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
                transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
            }
            41.04% {
                -webkit-transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
                transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
            }
            44.44% {
                -webkit-transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
                transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
            }
            52.15% {
                -webkit-transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
                transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
            }
            59.86% {
                -webkit-transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
                transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
            }
            61.66% {
                -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
                transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
            }
            63.26% {
                -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
                transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
            }
            75.28% {
                -webkit-transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
                transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
            }
            83.98% {
                -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
                transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
            }
            85.49% {
                -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
                transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
            }
            90.69% {
                -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
                transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
            }
            100% {
                -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
                transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
            }
        }

        @keyframes poppy {
            0% {
                -webkit-transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
                transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
            }
            3.4% {
                -webkit-transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
                transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
            }
            4.3% {
                -webkit-transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
                transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
            }
            4.7% {
                -webkit-transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
                transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
            }
            6.81% {
                -webkit-transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
                transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
            }
            8.61% {
                -webkit-transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
                transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
            }
            9.41% {
                -webkit-transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
                transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
            }
            10.21% {
                -webkit-transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
                transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
            }
            12.91% {
                -webkit-transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
                transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
            }
            13.61% {
                -webkit-transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
                transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
            }
            14.11% {
                -webkit-transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
                transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
            }
            17.22% {
                -webkit-transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
                transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
            }
            17.52% {
                -webkit-transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
                transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
            }
            18.72% {
                -webkit-transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
                transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
            }
            21.32% {
                -webkit-transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
                transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
            }
            24.32% {
                -webkit-transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
                transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
            }
            25.23% {
                -webkit-transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
                transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
            }
            28.33% {
                -webkit-transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
                transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
            }
            29.03% {
                -webkit-transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
                transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
            }
            29.93% {
                -webkit-transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
                transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
            }
            35.54% {
                -webkit-transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
                transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
            }
            36.74% {
                -webkit-transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
                transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
            }
            39.44% {
                -webkit-transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
                transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
            }
            41.04% {
                -webkit-transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
                transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
            }
            44.44% {
                -webkit-transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
                transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
            }
            52.15% {
                -webkit-transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
                transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
            }
            59.86% {
                -webkit-transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
                transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
            }
            61.66% {
                -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
                transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
            }
            63.26% {
                -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
                transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
            }
            75.28% {
                -webkit-transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
                transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
            }
            83.98% {
                -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
                transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
            }
            85.49% {
                -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
                transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
            }
            90.69% {
                -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
                transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
            }
            100% {
                -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
                transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
            }
        }

        .timer {

            margin-left: 85px;
            color: #2bbbad!important;

        }
        .timer * {
            cursor: default;
        }
        .timer h3 {
            width: 100%;
            font-size: 26px;
            letter-spacing: 4px;
            text-align: center;
        }
        .timer--clock {



            margin-top: 22px;
            overflow: hidden;
            left: 41%;
            top: 58%;
        }
        .timer--clock .clock-display-grp {
            width: 100%;
            position: relative;
        }
        .timer--clock .clock-display-grp .number-grp {
            width: auto;
            display: block;
            height: 156px;
            float: left;
            overflow: hidden;
        }
        .timer--clock .clock-display-grp .number-grp .number-grp-wrp {
            width: 100%;
            position: relative;
        }
        .timer--clock .clock-display-grp .number-grp .number-grp-wrp .num {
            width: 100%;
            position: relative;
            height: 156px;
        }
        .timer--clock .clock-display-grp .number-grp .number-grp-wrp .num p {
            width: auto;
            display: table;
            font-size: 30px;
            line-height: 150px;
            font-weight: bold;
        }
        .timer--clock .clock-separator {
            width: auto;
            float: left;
            display: block;
            height: 156px;
        }
        .timer--clock .clock-separator p {
            width: auto;
            display: table;
            font-size: 30px;
            line-height: 150px;
            font-weight: bold;
        }

        .reload {
            width: 121px;
            height: 14px;
            position: relative;
            bottom: 3rem;
            left: 34%;

            opacity: 0;
            display: none;
            cursor: pointer;
            z-index: 9999;
        }



        .main-panel {

            background-color: #F7F7FA;
        }
        .sidebar .nav i {
            font-size: 15px;

        }
        @media (min-width: 990px) {
            .row.equal {
                display: flex;
                flex-wrap: wrap;
            }
            .sidebar{
                width: 350px;
            }
            .sidebar .sidebar-wrapper{
                width: 350px;
            }
            .navbar-right {

                margin-right: -7px;
            }
            .sidebar .logo .simple-text {
                margin-left: 20px;
            }
        }
        th
        {
            text-align : center;
        }

        @media (min-width:992px)
        {
            .s-floatL{float:left!important;}
            .s-floatR{float: right!important;}
        }

    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" >



        <div class="sidebar-wrapper">

            <ul class="nav text-right ">
                <div class="user-profile">
                    <div class="avatarWrapper">
                        <div class="avatar" >
                            <div class="uploadOverlay"><img class="image-s"  src="{{ asset('image/student/dashboard/edit.png') }}"></div>

                            <img style="display: inline;" src="{{ asset('image/student/dashboard/user1.png') }}" alt="">

                        </div>
                    </div>

                </div>
                <div class="logo" dir="rtl">
                    <a class="simple-text">
                        {{ $student->isComplete ? $student->name.' '.$student->familyName : 'به سامانه همپا خوش آمدید.' }}
                    </a>
                </div>
                <hr id="sidebar-hr">

                <ul class="list-server-examblade">
                    <li>
                        <span class="list-server-answer"> EXML-761d4</span>
                    </li>
                    <li>
                        <span class="listserver-titleexamblade"> : کد آزمون</span>
                    </li>

                    <li>
                        <span class="list-server-answer"> 30</span>
                    </li>
                    <li>
                        <span class="listserver-titleexamblade"> : تعداد سوالات</span>
                    </li>
                </ul>
                <hr id="sidebar-hr">
                <ul class="list-server-examblade">



                    <li>
                        <span class="list-server-answer">ریاضی 1, جبر</span>
                    </li>
                    <li>
                        <span class="listserver-titleexamblade"> : نام درس ها</span>
                    </li>
                </ul>
                <hr id="sidebar-hr">

                <div class="timer">
                    <div class="timer--clock">
                        <div class="minutes-group clock-display-grp">
                            <div class="first number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                            <div class="second number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                        </div>
                        <div class="clock-separator"><p>:</p></div>
                        <div class="seconds-group clock-display-grp">
                            <div class="first number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                            <div class="second number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr id="sidebar-hr">
                <ul style="position: absolute; bottom: 0; ">
                <div class="col-md-6">
                        <button  class=" button-end  " type="submit">اتمام</button>
                </div>
                <div class="col-md-6">
                        <button class="button-perv" type="">بازگشت</button>
                </div>
                </ul>

            </ul>
        </div>
    </div>

    <div class="main-panel">

        <hr style="margin: 30px 0px 0px 0px; border-color: #f7f7fa;">

        <div class="content">
            <div class="container-fluid">
                @yield('content')

            </div>
        </div>




    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('js/student/dashboard/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/student/dashboard/popup.js')}}"></script>

<script src="{{asset('js/student/dashboard/bootstrap.min.js')}}" type="text/javascript"></script>


<script src="{{asset('js/student/dashboard/dashboard.js')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('js/student/dashboard/demo.js')}}"></script>

<script>


    //Bootstrap Validation
    /* (function() {
     'use strict';
     window.addEventListener('load', function() {
     // Fetch all the forms we want to apply custom Bootstrap validation styles to
     var forms = document.getElementsByClassName('needs-validation');
     // Loop over them and prevent submission
     var validation = Array.prototype.filter.call(forms, function(form) {
     form.addEventListener('submit', function(event) {
     if (form.checkValidity() === false) {
     event.preventDefault();
     event.stopPropagation();
     }
     form.classList.add('was-validated');
     }, false);
     });
     }, false);
     })(); */
    require('jquery-countdown');
    //Drop down optional
    $(".menu").select2({
        allowClear : true,
    });
    $(".hide-search").select2({
        minimumResultsForSearch : Infinity
    });
    $(".tags").select2({
        tags            : true,
        tokenSeparators : [',', ' ']
    })
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>

<script>
    popup = {
        init: function(){
            $('figure').click(function(){
                popup.open($(this));
            });

            $(document).on('click', '.popup img', function(){
                return false;
            }).on('click', '.popup', function(){
                popup.close();
            })
        },
        open: function($figure) {
            $('.gallery').addClass('pop');
            $popup = $('<div class="popup" />').appendTo($('body'));
            $fig = $figure.clone().appendTo($('.popup'));
            $bg = $('<div class="bg" />').appendTo($('.popup'));
            $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
            $shadow = $('<div class="shadow" />').appendTo($fig);
            src = $('img', $fig).attr('src');
            $shadow.css({backgroundImage: 'url(' + src + ')'});
            $bg.css({backgroundImage: 'url(' + src + ')'});
            setTimeout(function(){
                $('.popup').addClass('pop');
            }, 10);
        },
        close: function(){
            $('.gallery, .popup').removeClass('pop');
            setTimeout(function(){
                $('.popup').remove()
            }, 100);
        }
    }

    popup.init()


    TweenLite.defaultEase = Expo.easeOut;

    initTimer("{{ $lessonExam->remainingTime() }}"); // other ways --> "0:15" "03:5" "5:2"

    var reloadBtn = document.querySelector('.reload');
    var timerEl = document.querySelector('.timer');

    function initTimer (t) {

        var self = this,
            timerEl = document.querySelector('.timer'),
            minutesGroupEl = timerEl.querySelector('.minutes-group'),
            secondsGroupEl = timerEl.querySelector('.seconds-group'),

            minutesGroup = {
                firstNum: minutesGroupEl.querySelector('.first'),
                secondNum: minutesGroupEl.querySelector('.second')
            },

            secondsGroup = {
                firstNum: secondsGroupEl.querySelector('.first'),
                secondNum: secondsGroupEl.querySelector('.second')
            };

        var time = {
            min: t.split(':')[0],
            sec: t.split(':')[1]
        };

        var timeNumbers;

        function updateTimer() {

            var timestr;
            var date = new Date();

            date.setHours(0);
            date.setMinutes(time.min);
            date.setSeconds(time.sec);

            var newDate = new Date(date.valueOf() - 1000);
            var temp = newDate.toTimeString().split(" ");
            var tempsplit = temp[0].split(':');

            time.min = tempsplit[1];
            time.sec = tempsplit[2];

            timestr = time.min + time.sec;
            timeNumbers = timestr.split('');
            updateTimerDisplay(timeNumbers);

//      if(timestr === '0000')
//         countdownFinished();

            if(timestr != '0000')
                setTimeout(updateTimer, 1000);

        }

        function updateTimerDisplay(arr) {

            animateNum(minutesGroup.firstNum, arr[0]);
            animateNum(minutesGroup.secondNum, arr[1]);
            animateNum(secondsGroup.firstNum, arr[2]);
            animateNum(secondsGroup.secondNum, arr[3]);

        }

        function animateNum (group, arrayValue) {

            TweenMax.killTweensOf(group.querySelector('.number-grp-wrp'));
            TweenMax.to(group.querySelector('.number-grp-wrp'), 1, {
                y: - group.querySelector('.num-' + arrayValue).offsetTop
            });

        }

        setTimeout(updateTimer, 1000);

    }

    function countdownFinished() {
        setTimeout(function () {
            TweenMax.set(reloadBtn, { scale: 0.8, display: 'block' });
            TweenMax.to(timerEl, 1, { opacity: 0.2 });
            TweenMax.to(reloadBtn, 0.5, { scale: 1, opacity: 1 });
        }, 1000);
        document.getElementById('form').submit();
    }

    reloadBtn.addEventListener('click', function () {
        TweenMax.to(this, 0.5, { opacity: 0, onComplete:
            function () {
                reloadBtn.style.display= "none";
            }
        });
        TweenMax.to(timerEl, 1, { opacity: 1 });
        initTimer("00:05");
    });
</script>
<script src="{{asset('js/student/dashboard/jquery.countdown.min.js')}}"></script>

@yield('script')

</html>

