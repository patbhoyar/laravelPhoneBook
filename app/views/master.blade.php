<!doctype html>
<html>
<head>

    @if(isset($css))
        @foreach($css as $style)
            {{ HTML::style('css/'.$style.'.css') }}
        @endforeach
    @endif
        <?php 
            $pageTitle = isset($pageTitle)?$pageTitle:""; 
            $errorMsg = Session::get('errorMsg');
            $position = Session::get('position');
        ?>
	<title>{{ $pageTitle }}</title>
</head>
<body>
    <div id="headerContainer">
        <div id="header">
            <ul id="menu">
                <li id="home">{{ HTML::link('/', 'Home') }}</li>
                <li id="add">{{ HTML::link('/user/create', 'Add') }}</li>
                <li id="export">{{ HTML::link('/export/pdf', 'Export') }}</li>
            </ul>
            <ul id="exportMenu">
                <li id="csv">{{ HTML::link('/export/csv', 'Export as CSV') }}</li>
                <li id="pdf">{{ HTML::link('/export/pdf', 'Export as PDF') }}</li>
            </ul>
	    </div>
    </div>
        
    @if(isset($errorMsg) && $errorMsg !== '' && isset($position) && $position == 'top')
        <div id="errorNotifier">{{ $errorMsg }}</div>
    @endif
    
	<div id="displayContainer">

        <div id="pageTitleContainer">
            <div id="pageTitle">{{ $pageTitle }}</div>
            @if(isset($button) && $button == 'edit')
                <div class="buttons titleButton">
                    <!-- $userInfo passed with user.index page -->
                    {{ HTML::link('/user/'.$userInfo->getId().'/edit', 'Edit') }}
                </div>
            @endif
        </div>

        @if(isset($errorMsg) && $errorMsg !== '' && isset($position) && $position == 'middle')
            <div id="errorNotifier">{{ $errorMsg }}</div>
        @endif

        @yield('content')
	</div>

    @if(isset($scripts))
        @foreach($scripts as $script)
            {{ HTML::script('scripts/'.$script.'.js') }}
        @endforeach
    @endif
</body>
</html>