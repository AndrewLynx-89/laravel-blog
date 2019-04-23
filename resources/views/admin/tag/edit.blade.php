<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Меняем тег</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['tags.update',$tag->id], 'method'=>'put'])}}
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Название')}}
                        {{Form::text('title', $tag->title, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Тег'])}}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('tags.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
            {{Form::close()}}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>