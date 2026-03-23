<form role="search" method="get" action="<?php echo home_url('/'); ?>">
    
    <input type="search" 
           placeholder="Search..." 
           value="<?php echo get_search_query(); ?>" 
           name="s" />

    <button type="submit">
        🔍
    </button>

</form>