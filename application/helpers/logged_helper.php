<?php
// Helper

// -----------------------------------------------------------------------

/**
 * logged_in
 */
if ( ! function_exists('logged_in'))
{
    /**
     * logged_in ()
     * -------------------------------------------------------------------
     *
     * @return bool
     */
    function logged_in()
    {
        $CI =& get_instance();

        if ($CI->auth->logged_in() == TRUE)
        {
            return TRUE;
        }

        return FALSE;
    }
} 
?>