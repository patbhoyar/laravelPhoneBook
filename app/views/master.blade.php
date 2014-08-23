<!doctype html>
<html>
<head>
	{{ HTML::style('css/styles.css') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/script.js') }}
    {{ HTML::script('js/albumEdit.js') }}
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
                <li id="create">{{ HTML::link('/user/create', 'Add') }}</li>
                <li id="albums">{{ HTML::link('/export/pdf', 'Export') }}</li>
            </ul>
	    </div>
    </div>
        
    @if(isset($errorMsg) && $errorMsg !== '' && isset($position) && $position == 'top')
        <div id="errorNotifier">{{ $errorMsg }}</div>
    @endif
    
	<div id="displayContainer">

        <div id="pageTitleContainer">
            <div id="pageTitle">{{ $pageTitle }}</div>
        </div>

        @if(isset($errorMsg) && $errorMsg !== '' && isset($position) && $position == 'middle')
            <div id="errorNotifier">{{ $errorMsg }}</div>
        @endif

        @yield('content')
	</div>
</body>
</html>