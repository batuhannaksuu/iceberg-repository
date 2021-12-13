<h3><p align="center">Iceberg Estates</p></h3>
<hr>

## About This Challange

- Project developed with laravel repository pattern.
- API (Restfull) prepared for the needs determined in the scenario
- PHP Laravel used.

## Terms Of Running The Project

- LARAVEL 8.x
- PHP 7.3 or >
- GOOGLE DISTANCE MATRIX API and it should be added to the env file
- MYSQL
- POSTMAN

## Project Links And Usage

**baseUrl = icebergrepo.test/api**

## Authenticate or Users (POSTMAN)
## - baseUrl/register
    ## Headers 
        Content-Type application/json
        Accept application/json
    ## Body->raw
        {
        "name": "Batuhan Aksu",
        "email": "aaa@gmail.com",
        "password": "123456",
        "password_confirmation" : "123456"
        }
        
 ## - baseUrl/login
    ## Headers
        Content-Type application/json
        Accept application/json
    ## Body->raw
    {
        "email": "aaa@gmail.com",
        "password": "123456"
    }
 ## - baseUrl/logout
    ## Headers
        Content-Type application/json
        Accept application/json
        Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGVhMmNkYWZkMWYxMTZjNGM1ZThjZTEyOGNmMGRmZTY3ZGFhYjAxN2FiZWE3NGZhMDQwYTMxZGI0Y2YxNjk0ZGUxZjdmNTU2ZjU1YzFlYTkiLCJpYXQiOjE2MzkzOTY3OTYuODE4MjY0LCJuYmYiOjE2MzkzOTY3OTYuODE4MjY5LCJleHAiOjE2NzA5MzI3OTYuODEwNTg5LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.SN95U0XvZooOMn4IwFRwLXpgwRV9jmLBkeRFrCAmwwNVYajmom46hQEUZheb5QdE36nl4DzW6k-AHBrBBwwcTkTio3J0spTCXyPSnDehTJaVNzLvc8SKSDT0CZBLePs_0JR0kIYY8O8dDUKIYOt5sTqCUfDlkQrX-GhAEO16ZOGGQj1rrgTnZ9lv2Bs9m0I24qcvZxg2yAZsCPdoNHo5N2aOlPgFXyvVftOsQbcSt0F9vIcFhUGp9aM8Ns_vY1fgwUksdtrkAI4q3mL9hcnwezzk0NRGSPPaAuIPhjZqjoDFMnXIidUqbddraFEhfmpqQVGwb5QWfic6vu6TTDkVfrsVn3Ke4ad0sWS-PGJSWW_Otgrm4XUKBaZbCAalBl9dFkffWADaPeltQP9wGUotwUdWGeOrMe03ElWtqrFU8TcmwU8zLupz9w_X4InPb003aaq3s0I6KPMc3dGkh-F2rFEyeJzxWGEWvEDaPeTfsgiCpLbTPa_Qu0FzDUHGa5QvaFIyGKfiESPV1TU349tfMMmB_8axLNlaIXUOqfQCpe2v6US5giG5s2l8qG9BMzVGLQ3DyHMThrQavtAZ1XZbN49TYLdG9D0YnWta2UFEXbM8fG9oYE9bPqOKSLozF9mXg9d5WG2-nzY8QUWaGGnkfXfPLPDbfelH5StikSsGPbE

## Contact and Appointment (POSTMAN)
    ## - CREATE CONTACT AND APPOINTMENT
    ## - baseUrl/contact
        ## Headers 
            Content-Type application/json
            Accept application/json
        ## Body->raw
            {
                "name": "Çağrı",
                "surname": "Bağdatlı",
                "email": "qwerty@gmail.com",
                "phone": "053X XXX XXXX",
                "appointment_address": "Trafford 003C",
                "appointment_date": "2021-10-01",
                "appointment_time": "09:00:00",
                "post_code": "ox495nu"
            }
            
     ## - UPDATE APPOINTMENT
    ## - baseUrl/update/20
        ## Headers 
            Content-Type application/json
            Accept application/json
            Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGVhMmNkYWZkMWYxMTZjNGM1ZThjZTEyOGNmMGRmZTY3ZGFhYjAxN2FiZWE3NGZhMDQwYTMxZGI0Y2YxNjk0ZGUxZjdmNTU2ZjU1YzFlYTkiLCJpYXQiOjE2MzkzOTY3OTYuODE4MjY0LCJuYmYiOjE2MzkzOTY3OTYuODE4MjY5LCJleHAiOjE2NzA5MzI3OTYuODEwNTg5LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.SN95U0XvZooOMn4IwFRwLXpgwRV9jmLBkeRFrCAmwwNVYajmom46hQEUZheb5QdE36nl4DzW6k-AHBrBBwwcTkTio3J0spTCXyPSnDehTJaVNzLvc8SKSDT0CZBLePs_0JR0kIYY8O8dDUKIYOt5sTqCUfDlkQrX-GhAEO16ZOGGQj1rrgTnZ9lv2Bs9m0I24qcvZxg2yAZsCPdoNHo5N2aOlPgFXyvVftOsQbcSt0F9vIcFhUGp9aM8Ns_vY1fgwUksdtrkAI4q3mL9hcnwezzk0NRGSPPaAuIPhjZqjoDFMnXIidUqbddraFEhfmpqQVGwb5QWfic6vu6TTDkVfrsVn3Ke4ad0sWS-PGJSWW_Otgrm4XUKBaZbCAalBl9dFkffWADaPeltQP9wGUotwUdWGeOrMe03ElWtqrFU8TcmwU8zLupz9w_X4InPb003aaq3s0I6KPMc3dGkh-F2rFEyeJzxWGEWvEDaPeTfsgiCpLbTPa_Qu0FzDUHGa5QvaFIyGKfiESPV1TU349tfMMmB_8axLNlaIXUOqfQCpe2v6US5giG5s2l8qG9BMzVGLQ3DyHMThrQavtAZ1XZbN49TYLdG9D0YnWta2UFEXbM8fG9oYE9bPqOKSLozF9mXg9d5WG2-nzY8QUWaGGnkfXfPLPDbfelH5StikSsGPbE
        ## Body->raw
           {
                "appointment_address" : "Trafford 003c",
                "appointment_date": "2021-12-18",
                "appointment_time": "09:00:00",
                "post_code": "M320JG"
            }
           
    ## - LIST APPOINTMENT 
    ## - baseUrl/lists or baseUrl/lists/desc (baseUrl/lists/asc) 
        ## Headers 
            Content-Type application/json
            Accept application/json
            Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGVhMmNkYWZkMWYxMTZjNGM1ZThjZTEyOGNmMGRmZTY3ZGFhYjAxN2FiZWE3NGZhMDQwYTMxZGI0Y2YxNjk0ZGUxZjdmNTU2ZjU1YzFlYTkiLCJpYXQiOjE2MzkzOTY3OTYuODE4MjY0LCJuYmYiOjE2MzkzOTY3OTYuODE4MjY5LCJleHAiOjE2NzA5MzI3OTYuODEwNTg5LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.SN95U0XvZooOMn4IwFRwLXpgwRV9jmLBkeRFrCAmwwNVYajmom46hQEUZheb5QdE36nl4DzW6k-AHBrBBwwcTkTio3J0spTCXyPSnDehTJaVNzLvc8SKSDT0CZBLePs_0JR0kIYY8O8dDUKIYOt5sTqCUfDlkQrX-GhAEO16ZOGGQj1rrgTnZ9lv2Bs9m0I24qcvZxg2yAZsCPdoNHo5N2aOlPgFXyvVftOsQbcSt0F9vIcFhUGp9aM8Ns_vY1fgwUksdtrkAI4q3mL9hcnwezzk0NRGSPPaAuIPhjZqjoDFMnXIidUqbddraFEhfmpqQVGwb5QWfic6vu6TTDkVfrsVn3Ke4ad0sWS-PGJSWW_Otgrm4XUKBaZbCAalBl9dFkffWADaPeltQP9wGUotwUdWGeOrMe03ElWtqrFU8TcmwU8zLupz9w_X4InPb003aaq3s0I6KPMc3dGkh-F2rFEyeJzxWGEWvEDaPeTfsgiCpLbTPa_Qu0FzDUHGa5QvaFIyGKfiESPV1TU349tfMMmB_8axLNlaIXUOqfQCpe2v6US5giG5s2l8qG9BMzVGLQ3DyHMThrQavtAZ1XZbN49TYLdG9D0YnWta2UFEXbM8fG9oYE9bPqOKSLozF9mXg9d5WG2-nzY8QUWaGGnkfXfPLPDbfelH5StikSsGPbE
            
            
     ## - LISTBYDATE APPOINTMENT
    ## - baseUrl/listbydate/2021-12-12/2021-12-13
        ## Headers 
            Content-Type application/json
            Accept application/json
            Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGVhMmNkYWZkMWYxMTZjNGM1ZThjZTEyOGNmMGRmZTY3ZGFhYjAxN2FiZWE3NGZhMDQwYTMxZGI0Y2YxNjk0ZGUxZjdmNTU2ZjU1YzFlYTkiLCJpYXQiOjE2MzkzOTY3OTYuODE4MjY0LCJuYmYiOjE2MzkzOTY3OTYuODE4MjY5LCJleHAiOjE2NzA5MzI3OTYuODEwNTg5LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.SN95U0XvZooOMn4IwFRwLXpgwRV9jmLBkeRFrCAmwwNVYajmom46hQEUZheb5QdE36nl4DzW6k-AHBrBBwwcTkTio3J0spTCXyPSnDehTJaVNzLvc8SKSDT0CZBLePs_0JR0kIYY8O8dDUKIYOt5sTqCUfDlkQrX-GhAEO16ZOGGQj1rrgTnZ9lv2Bs9m0I24qcvZxg2yAZsCPdoNHo5N2aOlPgFXyvVftOsQbcSt0F9vIcFhUGp9aM8Ns_vY1fgwUksdtrkAI4q3mL9hcnwezzk0NRGSPPaAuIPhjZqjoDFMnXIidUqbddraFEhfmpqQVGwb5QWfic6vu6TTDkVfrsVn3Ke4ad0sWS-PGJSWW_Otgrm4XUKBaZbCAalBl9dFkffWADaPeltQP9wGUotwUdWGeOrMe03ElWtqrFU8TcmwU8zLupz9w_X4InPb003aaq3s0I6KPMc3dGkh-F2rFEyeJzxWGEWvEDaPeTfsgiCpLbTPa_Qu0FzDUHGa5QvaFIyGKfiESPV1TU349tfMMmB_8axLNlaIXUOqfQCpe2v6US5giG5s2l8qG9BMzVGLQ3DyHMThrQavtAZ1XZbN49TYLdG9D0YnWta2UFEXbM8fG9oYE9bPqOKSLozF9mXg9d5WG2-nzY8QUWaGGnkfXfPLPDbfelH5StikSsGPbE
            
            
      ## - DELETE APPOINTMENT
    ## - baseUrl/delete/20
        ## Headers 
            Content-Type application/json
            Accept application/json
            Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGVhMmNkYWZkMWYxMTZjNGM1ZThjZTEyOGNmMGRmZTY3ZGFhYjAxN2FiZWE3NGZhMDQwYTMxZGI0Y2YxNjk0ZGUxZjdmNTU2ZjU1YzFlYTkiLCJpYXQiOjE2MzkzOTY3OTYuODE4MjY0LCJuYmYiOjE2MzkzOTY3OTYuODE4MjY5LCJleHAiOjE2NzA5MzI3OTYuODEwNTg5LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.SN95U0XvZooOMn4IwFRwLXpgwRV9jmLBkeRFrCAmwwNVYajmom46hQEUZheb5QdE36nl4DzW6k-AHBrBBwwcTkTio3J0spTCXyPSnDehTJaVNzLvc8SKSDT0CZBLePs_0JR0kIYY8O8dDUKIYOt5sTqCUfDlkQrX-GhAEO16ZOGGQj1rrgTnZ9lv2Bs9m0I24qcvZxg2yAZsCPdoNHo5N2aOlPgFXyvVftOsQbcSt0F9vIcFhUGp9aM8Ns_vY1fgwUksdtrkAI4q3mL9hcnwezzk0NRGSPPaAuIPhjZqjoDFMnXIidUqbddraFEhfmpqQVGwb5QWfic6vu6TTDkVfrsVn3Ke4ad0sWS-PGJSWW_Otgrm4XUKBaZbCAalBl9dFkffWADaPeltQP9wGUotwUdWGeOrMe03ElWtqrFU8TcmwU8zLupz9w_X4InPb003aaq3s0I6KPMc3dGkh-F2rFEyeJzxWGEWvEDaPeTfsgiCpLbTPa_Qu0FzDUHGa5QvaFIyGKfiESPV1TU349tfMMmB_8axLNlaIXUOqfQCpe2v6US5giG5s2l8qG9BMzVGLQ3DyHMThrQavtAZ1XZbN49TYLdG9D0YnWta2UFEXbM8fG9oYE9bPqOKSLozF9mXg9d5WG2-nzY8QUWaGGnkfXfPLPDbfelH5StikSsGPbE



        
        
    




