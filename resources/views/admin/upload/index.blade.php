<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('uploads.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($uploads  as $upload)
                    <tr>
                        <td>{{$upload->id}}</td>
                        <td>{{$upload->title}}</td>
                        <td>
                            <a href="{{route('uploads.edit', $upload->id)}}" class="fa fa-pencil"></a>

                            {{Form::open(['route'=>['uploads.destroy', $upload->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                <i class="fa fa-remove"></i>
                            </button>

                            {{Form::close()}}

                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>