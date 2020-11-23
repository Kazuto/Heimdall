    <div class="card">
        <header class="card__header">
            <div class="card__title">{{ __('app.apps.add_tag') }}</div>
            <div class="spacer"></div>
            <div class="card__actions">
                <button type="submit"class="card__action"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
                <a href="{{ route('tags.index', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
            </div>
        </header>
        <div class="card__body card__body--flush">
            <div id="create" class="create">
                {!! csrf_field() !!}
    
                <div class="input">
                    <label>{{ __('app.apps.tag_name') }} *</label>
                    {!! Form::text('title', null, array('placeholder' => __('app.apps.title'), 'class' => 'form-control')) !!}
                    <hr />
                    <label>{{ __('app.apps.pinned') }}</label>
                    {!! Form::hidden('pinned', '0') !!}
                    <label class="switch">
                        <?php
                        $checked = false;
                        if(isset($item->pinned) && (bool)$item->pinned === true) $checked = true;
                        $set_checked = ($checked) ? ' checked="checked"' : '';
                        ?>                   
                        <input type="checkbox" name="pinned" value="1"<?php echo $set_checked;?> />
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="input">
                    <label>{{ __('app.apps.colour') }} *</label>
                    {!! Form::text('colour', null, array('placeholder' => __('app.apps.hex'),'class' => 'form-control color-picker')) !!}
                    <hr />
                </div>
                <div class="input">
                    <label>{{ __('app.apps.icon') }}</label>
                    <div class="icon-container">
                        <div id="appimage">
                        @if(isset($item->icon) && !empty($item->icon) || old('icon'))
                        <?php
                            if(isset($item->icon)) $icon = $item->icon;
                            else $icon = old('icon');
                        ?>
                        <img src="{{ asset('storage/'.$icon) }}" />
                        {!! Form::hidden('icon', $icon, ['class' => 'form-control']) !!}
                        @else
                        <img src="/img/heimdall-icon-small.png" />
                        @endif
                        </div>
                        <div class="upload-button-wrapper">
                        <button class="button button--primary">{{ __('app.buttons.upload')}} </button>
                            <input type="file" id="upload" name="file" />
                        </div>
                    </div>
                </div>
                
                <div id="sapconfig"></div>
                
            </div>
        </div>
        <footer class="card__footer">
            <div class="spacer"></div>
            <div class="card__actions">
                <button type="submit"class="card__action"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
                <a href="{{ route('tags.index', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
            </div>
        </footer>

    </div>


