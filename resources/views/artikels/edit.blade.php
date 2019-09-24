@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Artikel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($artikel, ['route' => ['artikels.update', $artikel->id], 'method' => 'patch']) !!}

                        @include('artikels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection