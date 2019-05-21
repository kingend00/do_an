@extends('Layout.admin.master')
@section('title')
    Thống kê
@stop
@section('body')
<div class="container">	
<?php  date_default_timezone_set('Asia/Ho_Chi_Minh');    ?> 
<div class="row">
<form method="POST" id="formShow">
        {{ csrf_field() }}
                <div class="col-sm-2"></div>
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                    <label>Từ ngày</label>
                                    <div class="input-group date nk-int-st" id="Picker">
                                        <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" id="from" name="from" value="{{ date('d/m/Y',time()) }}" data-date-format = 'yy-mm-dd'>
                                    </div>
                                </div>
                            </div>
                <div class="col-sm-2"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <label>Đến ngày</label>
                            <div class="input-group date nk-int-st" id="Picker">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" id="to" name="to" value="- - / - - / - - - -" data-date-format = 'yy-mm-dd'>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-2"></div>       
    </div>
    <div clas = "col-sm-12" style="text-align:center">
            <button type="submit" class="btn btn-lightblue lightblue-icon-notika btn-add"><i class="notika-icon notika-checked"></i>  Xem Thống kê</button>
     </div>
    </form>
    <div id="result">
         
    </div>
</div>

<script type = "text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
        $('#from').datepicker();
        $('#to').datepicker();
        $('#formShow').on('submit',function(e){ 
            e.preventDefault();
            $.ajax({
                type:"POST",
                url : '{{ route("B_statistic.time") }}',
                data : $('#formShow').serialize(),	
                success:function(data)
                {
                    $('#result').html(data);
                },
                error:function(er)
                {   
                    console.log(er);
                }
            });
        });
    });


</script>

@stop