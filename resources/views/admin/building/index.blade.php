@extends('admin.layouts.layout')

@section('title')

  كافة الأعضاء
@stop

@section('styling')

  {!! Html::style('dashboard/plugins/datatables/dataTables.bootstrap.css') !!}
@stop

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

      
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {{--CHANGING FROM EXAMPLETABLE TO DATA TABLE<table id="example2" class="table table-bordered table-hover">--}}
              <table id="data" class="table table-bordered table-hover">
                



              <thead>

                  <tr>
                    <th>#</th>
                    <th>إسم العقار</th>
                    <th>ثمن العقار</th>
                    <th>نوع العقار</th>
                    <th>مساحة العقار</th>
                    <th>نوع العقار</th>
                    <th>عن العقار ت.ص</th>
                    <th>عن العقار ت.ص</th>
                    <th>كلمات تعريفية</th>
                    <th>خط الطول</th>
                    <th>خط العرض</th>
                    <th>حالة العقار</th>
                    <th>منطقة العقار</th>
                    <th>نشر في</th>
                    <th>حدث في</th>
                    <th>تحديث العقار</th>
                    <th>حذف العفار</th>
                  </tr>
                </thead>
                <tbody>




                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>إسم العقار</th>
                    <th>ثمن العقار</th>
                    <th>نوع العقار</th>
                    <th>مساحة العقار</th>
                    <th>نوع العقار</th>
                    <th>عن العقار ت.ص</th>
                    <th>عن العقار ت.ص</th>
                    <th>كلمات تعريفية</th>
                    <th>خط الطول</th>
                    <th>خط العرض</th>
                    <th>حالة العقار</th>
                    <th>منطقة العقار</th>
                    <th>نشر في</th>
                    <th>حدث في</th>
                    <th>تحديث العقار</th>
                    <th>حذف العفار</th>
                    </tr>
                  </tfoot>




              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->




        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop

@section('usefullJS')

  {!! Html::script('dashboard/plugins/datatables/jquery.dataTables.min.js') !!}
  {!! Html::script('dashboard/plugins/datatables/dataTables.bootstrap.min.js') !!}

@stop

@section('scripting')


  <script>
  /*DATATABLES CODE*/
        var lastIdx = null;

        $('#data thead th').each( function () {

          if( $(this).index() == 3 ){
            $(this).html( '<select>' +
              @foreach( BuildingRent(-1) as $bui_rentK => $bui_rent )

                '<option value="{{ $bui_rentK }}">{{ $bui_rent }}</option>' +

              @endforeach
              
              '</select>' );
          }else if( $(this).index() == 5 ){
            $(this).html( '<select>' +
              @foreach( BuildingType(-1) as $bui_typeK => $bui_type )

                '<option value="{{ $bui_typeK }}">{{ $bui_type }}</option>' +

              @endforeach
              
              '</select>' );
          }else if( $(this).index() == 11 ){
            $(this).html( '<select>' +
              @foreach( BuildingStatu(-1) as $bui_statuK => $bui_statu )

                '<option value="{{ $bui_statuK }}">{{ $bui_statu }}</option>' +

              @endforeach
              
              '</select>' );
          }else if( $(this).index() == 12 ){
            $(this).html( '<select>' +
              @foreach( BuildingPlace(-1) as $bui_placeK => $bui_place )

                '<option value="{{ $bui_placeK }}">{{ $bui_place }}</option>' +

              @endforeach
              
              '</select>' );
          }else if( $(this).index() < 15 ){

                var classname = $(this).index() == 12   ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" بحث في '+title+'" />' );
          }


        } );



        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/buildings/data') }}',
            columns: [


                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'rent', name: 'rent'},
                {data: 'square', name: 'square'},
                {data: 'type', name: 'type'},
                {data: 'smallDisc', name: 'smallDisc'},
                {data: 'largDisc', name: 'largDisc'},
                {data: 'tags', name: 'tags'},
                {data: 'lang', name: 'lang'},
                {data: 'lat', name: 'lat'},
                {data: 'status', name: 'status'},
                {data: 'codePostalMaroc', name: 'codePostalMaroc'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'edit', name: ''},
                {data: 'delete', name: ''}
            ],

            "language": {
                "url": "{{ Request::root()  }}/admin/cust/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'asc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [


                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
                .on( 'mouseover', 'td', function () {
                    var colIdx = table.cell(this).index().column;

                    if ( colIdx !== lastIdx ) {
                        $( table.cells().nodes() ).removeClass( 'highlight' );
                        $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                    }
                } )
                .on( 'mouseleave', function () {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                } );













    $(function () {

      /*
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });

*/

      $("#delete").on("click", function(event) {
          if( !confirm('تأكيد الحذف') ) 
              event.preventDefault();
      });
    });
  </script>



    
<script>
$('div.alert').delay(2000).fadeOut(3500);
</script>
  


@stop













