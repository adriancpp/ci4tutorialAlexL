<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index()
    {
        helper(['form']);

        $data = [];
        $data['categories'] = [
            'Student',
            'Teacher',
            'Principle'
        ];




        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email address',
                    'errors' => [
                        'required' => 'Hey, this email is a required field',
                        'valid_email' => 'Oh, man, really? This is email???'
                    ]
                ],
                'password' => 'required|min_length[8]',
                'category' => 'in_list[Student, Teacher]',
                'date' => [
                    'rules' => 'required|check_date',
                    'label' => 'Date',
                    'errors' => [
                        'check_date' => 'You can not add a date before today '
                    ]
                ]
            ];

            if($this->validate($rules))
            {
                return redirect()->to('form/success');

                // Then do db insert
                // login user
            }
            else
            {
                $data['validation'] = $this->validator;
            }

//            echo '<pre>';
//            print_r($_POST);
//            echo '<pre>';
        }

        return view('form', $data);
    }

    function success()
    {
        return 'Hey, you have passed the validation. Congrats!';
    }
}