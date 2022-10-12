@extends('layouts.admin')

@section('content')
<form action="{{ route('dashboards') }}" method="post">
{{ csrf_field() }}
<div class="textcolor">
    <div class="container overflow-hidden px-4">
        @if(\Session::has('success'))
        <div class="alert alert-<?php echo 'success'; ?>" role= "alert" id="artMsg">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden='true'>&times;</span>
            <span class ="sr-only">Close</span>
        </button>
        {!!\Session::get('success')!!}
    </div>
    @endif
    @if(\Session::has('error'))
        <div class="alert alert-<?php echo 'danger'; ?>" role= 'alert' id='artMsg'>
        <button type='button' class='close' data-bs-dismiss='alert'>
            <span aria-hidden='true'>&times;</span>
            <span class ='sr-only'>Close</span>
        </button>{!! \Session::get('error') !!}
    </div>
    @endif
        <div class="container row gy-5 colstyle colpadding">
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-user icons px-3 py-3" id="icon1"></span></div>
                <div class="col-9"> Total Admins</div>
            </div>
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-users icons px-3 py-3" id="icon2"></span></div>
                <div class="co1-9">Total Members</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM users ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." registered"."</h6>"
                    ?>
                </div>
            </div>
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-tasks icons px-3 py-3" id="icon3"></span></div>
                <div class="col-9">Total Tasks</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM tasks ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." added"."</h6>"
                    ?>
                </div>
            </div>
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-list-alt icons px-3 py-3" id="icon4"></span></div>
                <div class="col-9">Total Categories</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM categories ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." added"."</h6>"
                    ?>
                </div>
            </div>
        </div>
        <div class="container row gy-5 colstyle colpadding">
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-diagram-project icons px-3 py-3" id="icon5"></span></div>
                <div class="col-9">Total Projects</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM projects ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." added"."</h6>"
                    ?>
                </div>
            </div>
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-battery-empty icons px-3 py-3" id="icon6"></span></div>
                <div class="col-9">Pending Tasks</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM tasks WHERE  status = 'Pending' ";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." added"."</h6>"
                    ?>
                </div>
            </div>
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-battery-half icons px-3 py-3" id="icon7"></span></div>
                <div class="col-9">Task on progress</div>
                <div class="p-2 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM tasks WHERE  status = 'On Progress' ";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." added"."</h6>"
                    ?>
                </div>
            </div>
            <div class="col-3 containerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-battery-full icons px-3 py-3" id="icon8"></span></div>
                <div class="col-9">Completed Tasks</div>
                <div class="p-2 px-2 font-weight-bold text-black">
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '','tms');

                        $query = "SELECT id FROM tasks WHERE  status = 'Completed' ";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);
                        echo "<h6>".$row." added"."</h6>"
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container overflow-hidden px-4 py-3">
        <div class="container row gy-5 colespace colpadding">
            <div class="col-3 progresscontainer bg-light rounded">
                <div class="p-3 me-2 fontsize">Completed Tasks</div>
                <div class="container progressbar1">
                    <div class="circular-progress1">
                        <span class="progress-value1"></span>
                    </div>
                    <div class="p-5 px-2 font-weight-bold text-black">
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '','tms');

                            $query = "SELECT id FROM tasks WHERE  status = 'Completed' ";
                            $query_run = mysqli_query($connection, $query);

                            $row = mysqli_num_rows($query_run);
                            echo "<h6>".$row." added"."</h6>"
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-3 progresscontainer bg-light rounded">
                <div class="p-3 me-2 fontsize">Task on progress</div>
                <div class="container progressbar2">
                    <div class="circular-progress2">
                        <span class="progress-value2"></span>
                    </div>
                    <div class="p-5 px-2 font-weight-bold text-black">
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '','tms');

                            $query = "SELECT id FROM tasks WHERE  status = 'On Progress' ";
                            $query_run = mysqli_query($connection, $query);

                            $row = mysqli_num_rows($query_run);
                            echo "<h6>".$row." added"."</h6>"
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-3 progresscontainer bg-light rounded">
                <div class="p-3 me-2 fontsize">Pending Tasks</div>
                <div class="container progressbar3">
                    <div class="circular-progress3">
                        <span class="progress-value3"></span>
                    </div>
                    <div class="p-3 px-2 font-weight-bold text-black" id="pending">
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '','tms');

                            $query = "SELECT id FROM tasks WHERE  status = 'Pending' ";
                            $query_run = mysqli_query($connection, $query);

                            $row = mysqli_num_rows($query_run);
                            echo "<h6>".$row." added"."</h6>"
                        ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
