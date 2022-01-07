@extends('layouts.master')

@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="mb-3 mb-xl-0">
            <div class="btn-group dropdown">
                <button type="button" class="btn btn-primary">14 Aug 2019</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                    <a class="dropdown-item" href="#">2015</a>
                    <a class="dropdown-item" href="#">2016</a>
                    <a class="dropdown-item" href="#">2017</a>
                    <a class="dropdown-item" href="#">2018</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <!-- div -->
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Basic Style2 Tabs
                </div>
                <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab"> تفاصيل الفاتورة</a></li>
                                        <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                        <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab4">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">رقم الفاتورة </th>

                                                        <th class="wd-20p border-bottom-0">المصرف </th>
                                                        <th class="wd-15p border-bottom-0">نوع الخدمة</th>
                                                        <th class="wd-10p border-bottom-0">مبلغ التحصيل</th>
                                                        <th class="wd-10p border-bottom-0">العمولة</th>
                                                        <th class="wd-25p border-bottom-0">الخصم</th>
                                                        <th class="wd-25p border-bottom-0">نسبة الضريبة</th>
                                                        <th class="wd-25p border-bottom-0"> الاجمالي </th>
                                                        <th class="wd-25p border-bottom-0"> ملاحظات </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $i=1 ?>
                                                    @foreach ($invoices as $invoice )
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$invoice->invoice_number}}</td>
                                                        <td>{{$invoice->section->section_name}}</td>
                                                        <td>{{$invoice->product->product_name}}</td>
                                                        <td>{{$invoice->Discount}}</td>
                                                        <td>{{$invoice->Amount_Commission}}</td>

                                                        <td>{{$invoice->Value_VAT}}</td>
                                                        <td>{{$invoice->Rate_VAT}}</td>
                                                        <td>{{$invoice->Total}}</td>
                                                        <td>{{$invoice->note}}</td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">رقم الفاتورة </th>

                                                        <th class="wd-20p border-bottom-0">المصرف </th>
                                                        <th class="wd-15p border-bottom-0">نوع الخدمة</th>
                                                        <th class="wd-10p border-bottom-0">مبلغ التحصيل</th>
                                                        <th class="wd-10p border-bottom-0">العمولة</th>
                                                        <th class="wd-25p border-bottom-0">الخصم</th>
                                                        <th class="wd-25p border-bottom-0">نسبة الضريبة</th>
                                                        <th class="wd-25p border-bottom-0"> الاجمالي </th>
                                                        <th class="wd-25p border-bottom-0"> ملاحظات </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $i=1 ?>
                                                    @foreach ($invoices as $invoice )
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$invoice->invoice_number}}</td>
                                                        <td>{{$invoice->section->section_name}}</td>
                                                        <td>{{$invoice->product->product_name}}</td>
                                                        <td>{{$invoice->Discount}}</td>
                                                        <td>{{$invoice->Amount_Commission}}</td>

                                                        <td>{{$invoice->Value_VAT}}</td>
                                                        <td>{{$invoice->Rate_VAT}}</td>
                                                        <td>{{$invoice->Total}}</td>
                                                        <td>{{$invoice->note}}</td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab6">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0"> أسم الملف </th>

                                                        <th class="wd-20p border-bottom-0">قام أضافة الملف </th>
                                                        <th class="wd-15p border-bottom-0"> تاريخ الاضافة</th>
                                                        <th class="wd-10p border-bottom-0"> العمليات</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $i=1 ?>
                                                    @foreach ($invoices as $invoice )
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$invoice->image}}</td>
                                                        <td>{{$invoice->users->name}}</td>
                                                        <td>{{$invoice->created_at}}</td>
                                                        <td>

                                                            <a class="btn btn-outline-success btn-sm" href="{{route('show',$invoice->id)}}" role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                عرض</a>

                                                            <a class="btn btn-outline-info btn-sm" href="{{ url('download') }}/{{$invoice->id  }}" role="button"><i class="fas fa-download"></i>&nbsp;
                                                                تحميل</a>


                                                            <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-file_name="{{ $invoice->image  }}" data-invoice_number="{{ $invoice->invoice_number }}" data-id_file="{{ $invoice->id }}" data-target="#delete_file">حذف</button>


                                                        </td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!---Prism Pre code-->

                    <!---Prism Pre code-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
<div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete_image')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                    </p>

                    <input type="hidden" name="id_file" id="id_file" value="">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script>
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_file = button.data('id_file')
        var modal = $(this)
        modal.find('.modal-body #id_file').val(id_file);
    })

</script>

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
@endsection
