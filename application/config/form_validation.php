<?php

$config = array(
                
                 'admin_login' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'E-mail',
                                            'rules' => 'required|trim|htmlspecialchars|max_length[50]|valid_email'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|trim|htmlspecialchars|max_length[20]'
                                         )
                                    ),
                'company_login' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'username',
                                            'rules' => 'required|trim|htmlspecialchars'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|trim|htmlspecialchars'
                                         )
                                    ),     
                                    

            'create_user' => array(
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'First Name',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|min_length[3]|max_length[50]'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|min_length[3]|max_length[50]'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'E-mail',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|max_length[50]|valid_email'
                                         ),
                                    array(
                                            'field' => 'pass1',
                                            'label' => 'Password',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|min_length[2]|max_length[20]|matches[pass2]'
                                         ),
                                    array(
                                            'field' => 'pass2',
                                            'label' => 'Password again',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|min_length[2]|max_length[20]'
                                         )
                                    ),
                'update_user' => array(
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'First Name',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|min_length[3]|max_length[50]'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|min_length[3]|max_length[50]'
                                         ),     
                                    array(
                                            'field' => 'email',
                                            'label' => 'E-mail',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|max_length[50]|valid_email'
                                         ),
                                    array(
                                        'field' => 'pass1',
                                        'label' => 'Password',
                                        'rules' => 'trim|xss_clean|htmlspecialchars|min_length[2]|max_length[20]|matches[pass2]'
                                    ),
                                    array(
                                            'field' => 'pass2',
                                            'label' => 'Password again',
                                            'rules' => 'trim|xss_clean|htmlspecialchars|min_length[2]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'user_id',
                                            'label' => 'User ID',
                                            'rules' => 'required|trim|xss_clean|htmlspecialchars|numeric|callback__check_user_id'
                                        )
                                    ), 
            'admin_register' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'Username',
                                            'rules' => 'trim|required|alpha_numeric|is_unique[users.username]'
                                         ),
                                    array(
                                            'field' => 'first_name',
                                            'labl' => 'First Name',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',
                                            'errors' => array(
                                                    'regex_match' => 'In %s Alphabets and Spaces only allowed.',
                                            ),
                                         
                                    ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',
                                            'errors' => array(
                                                    'regex_match' => 'In %s  Alphabets and Spaces only allowed.',
                                            ),
                                         
                                    ),
                                    array(
                                            'field' => 'middle_name',
                                            'label' => 'Middle Name',
                                            'rules' => 'trim|htmlspecialchars|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z ]+$/]',
                                            'errors' => array(
                                                    'regex_match' => 'In %s  Alphabets and Spaces only allowed.',
                                            ),
                                         
                                    ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'E-Mail',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[3]|max_length[50]|valid_email|is_unique[users.email]'
                                         
                                    ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|min_length[3]|max_length[50]'
                                         
                                    ),
                                    array(
                                            'field' => 'gender',
                                            'label' => 'Gender',
                                            'rules' => 'required|in_list[male,female]'
                                         
                                    ),
                                    array(
                                            'field' => 'address',
                                            'label' => 'Address',
                                            'rules' => 'required|trim|regex_match[/^[a-zA-Z ]+$/]',
                                            'errors' => array(
                                                    'regex_match' => 'In %s Alphabets and Spaces only allowed.',
                                            ),
                                         
                                    ),
                                    array(
                                            'field' => 'contact_no',
                                            'label' => 'Contact No',
                                            'rules' => 'required|trim'
                                         
                                    ),
                                ),

);










?>