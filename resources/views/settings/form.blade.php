<div class="card">
    <header class="card__header">
        <div class="card__title">{{ __($setting->label) }}</div>
        <div class="spacer"></div>
        <div class="card__actions">
            <button type="submit" class="card__action"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
            <a href="{{ route('settings.index', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
        </div>
    </header>
    <div class="card__body card__body--flush">
        <div class="create">
            {!! csrf_field() !!}
            <?php /*<div class="input">
                    <label>Application name</label>
                    {!! Form::select('supported', \App\Item::supportedOptions(), array('placeholder' => 'Title','class' => 'form-control')) !!}
                </div>*/ ?>

            <div class="input">
                {!! $setting->edit_value !!}
            </div>


        </div>
    </div>
    <footer class="card__footer">
        <div class="spacer"></div>
        <div class="card__actions">
            <button type="submit" class="card__action"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
            <a href="{{ route('settings.index', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
        </div>
    </footer>
</div>