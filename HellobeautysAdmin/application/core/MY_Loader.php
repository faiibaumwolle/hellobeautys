<?php

class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
        $content  = $this->view('templates/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('templates/footer', $vars, $return);

        return $content;
    else:
        $this->view('templates/header', $vars);
        $this->view($template_name, $vars);
        $this->view('templates/footer', $vars);
    endif;
    }
    
    public function multiple_template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
        $content  = $this->view('templates/header', $vars, $return);
        for($i = 0; $i < count($template_name); $i++){
            $content .= $this->view($template_name[$i], $vars, $return);
        }
        $content .= $this->view('templates/footer', $vars, $return);

        return $content;
    else:
        $this->view('templates/header', $vars);
        for($i = 0; $i < count($template_name); $i++){
            $this->view($template_name[$i], $vars);
        }
        $this->view('templates/footer', $vars);
    endif;
    }
}