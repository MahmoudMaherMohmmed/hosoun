@extends('admin/layouts.master')

@section('title', __('adminstaticword.Books'))

@section('body')
<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Books') }}</h3>
                    <a type="button" class="btn btn-info btn-sm" href="{{ route('books.create') }}">
                        + {{ __('adminstaticword.AddBook') }}
                    </a>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Name') }}</th>
                                    <th>{{ __('adminstaticword.Category') }}</th>
                                    <th>{{ __('adminstaticword.SubCategory') }}</th>
                                    <th>{{ __('adminstaticword.ChildCategory') }}</th>
                                    <th>{{ __('adminstaticword.Status') }}</th>
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @foreach($books as $key=>$book)
                                <tr class="sortable" id="id-{{ $book->id }}">
                                    <td>{{ $key+1 }}</td>

                                    <td>{{$book->title}}</td>

                                    <td>{{$book->child_category->sub_category->category->title}}</td>

                                    <td>{{$book->child_category->sub_category->title}}</td>

                                    <td>{{$book->child_category->title}}</td>

                                    <td>
                                        <form action="{{ route('books.quick',$book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="Submit"
                                                class="btn btn-xs table-status {{ $book->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                                @if($book->status ==1)
                                                {{ __('adminstaticword.Active') }}
                                                @else
                                                {{ __('adminstaticword.Deactive') }}
                                                @endif
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <a class="table-edit" href="{{url('books/'.$book->id).'/edit'}}"><i class='bx bx-edit' ></i></a>
                                    </td>

                                    <td>
                                        <form method="post" action="{{url('books/'.$book->id)}}" data-parsley-validate
                                            class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-null table-delete"><i class='bx bx-trash' ></i></button>
                                        </form>
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
</section>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });

    $("#sortable").sortable({
        update: function (e, u) {
            var data = $(this).sortable('serialize');

            $.ajax({
                url: "{{ route('category_reposition') }}",
                type: 'get',
                data: data,
                dataType: 'json',
                success: function (result) {
                    console.log(data);
                }
            });
        }
    });
</script>

@endsection