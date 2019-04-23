<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      {!! Form::open(['route' => 'categories.store']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем категорию</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              {{Form::label('exampleInputEmail1', 'Название')}}
              {{Form::text('title', null, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Категория'])}}
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('categories.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
        {!! Form::close() !!}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
