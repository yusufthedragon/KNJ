@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contact
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contact, ['route' => ['contact.update', $contact->id], 'method' => 'patch']) !!}

                        @include('contact.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection