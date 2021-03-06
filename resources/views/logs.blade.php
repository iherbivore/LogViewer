@extends('log-viewer::_template.master')

@section('content')
    <h1 class="page-header">Logs</h1>

    {!! $rows->render() !!}

    <div class="table-responsive">
        <table class="table table-condensed table-hover table-stats">
            <thead>
                <tr>
                    @foreach($headers as $key => $header)
                    <th class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                        @if ($key == 'date')
                            <span class="label label-info">{{ $header }}</span>
                        @else
                            <span class="level level-{{ $key }}">
                                {!! log_styler()->icon($key) . ' ' . $header !!}
                            </span>
                        @endif
                    </th>
                    @endforeach
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $date => $row)
                <tr>
                    @foreach($row as $key => $value)
                    <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                        @if ($key == 'date')
                            <span class="label label-primary">{{ $value }}</span>
                        @elseif ($value == 0)
                            <span class="level level-empty">{{ $value }}</span>
                        @else
                            <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                <span class="level level-{{ $key }}">{{ $value }}</span>
                            </a>
                        @endif
                    </td>
                    @endforeach
                    <td class="text-right">
                        <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="btn btn-xs btn-info">
                            <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-xs btn-success">
                            <i class="fa fa-download"></i>
                        </a>                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $rows->render() !!}

    
@stop

@section('scripts')
    <script>
        $(function () {
            
        });
    </script>
@stop
