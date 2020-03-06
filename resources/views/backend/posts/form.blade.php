<div class="col-md-9">
    <div class="box box-default">
        <div class="box-body">

            <div class="form-group @if ($errors->has('title')) has-error @endif">
                {!! Form::label('title','Title *', ['class' => 'control-label']) !!}
                {!! Form::text('title',null, ['class'=> 'form-control']) !!}

                @if ($errors->has('title'))
                    <span class="help-block">
                        {{ $errors->first('title') }}
                    </span>
                @endif
            </div>
            <div class="form-group @if ($errors->has('tags')) has-error @endif">
                {!! Form::label('tags','Tags *(Seprate Tags with comma)', ['class' => 'control-label']) !!}
                {!! Form::text('tags',null, ['class'=> 'form-control']) !!}

                @if ($errors->has('tags'))
                    <span class="help-block">
                        {{ $errors->first('tags') }}
                    </span>
                @endif
            </div>

            <div class="form-group @if ($errors->has('content')) has-error @endif">
                {!! Form::label('content','Content *', ['class' => 'control-label']) !!}
                {{ Form::textarea('content', null, ['class' => 'form-control']) }}

                @if ($errors->has('content'))
                    <span class="help-block">
                        {{ $errors->first('content') }}
                    </span>
                @endif

            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</div>

<div class="col-md-3">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Page Attributes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="form-group @if ($errors->has('status')) has-error @endif">
                {!! Form::label('status','Status', ['class' => 'control-label']) !!}
                {{ Form::select('status', [1 => 'Enabled', 0 => 'Disabled'], null, ['class' => 'form-control']) }}

                @if ($errors->has('status'))
                    <span class="help-block">
                        {{ $errors->first('status') }}
                    </span>
                @endif
            </div>

            <div class="form-group @if ($errors->has('featured_image')) has-error @endif">
                {!! Form::label('featured_image','Featured Image', ['class' => 'control-label']) !!}
                {!! Form::file('featured_image', ['class'=> 'form-control']) !!}

                @if ($errors->has('featured_image'))
                    <span class="help-block">
                        {{ $errors->first('featured_image') }}
                    </span>
                @endif

                @if(isset($post) && null !== $post->getImage())
                    <div class="mt-15">
                        <img src="{{ $post->getImage()->mediumUrl }}" class="thumbnail img-responsive mb-none">
                    </div>
                @endif

            </div>

        </div>
        <div class="box-footer">
            {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
        </div>
    </div>
</div>