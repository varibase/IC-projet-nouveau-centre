@include('googlmapper::javascript')

@foreach ($items as $new_id => $item)

	{!! $item->render($new_id, $view) !!}

    @if ($options['async'])

        <script type="text/javascript">
            
            initialize_items.push({
                method: initialize_{!! $new_id !!}
            });

        </script>

    @endif

@endforeach
