SELECT num_ticket,poids_net,camion,origine,origine_id,destination_id,poids_net,cout_km,cout_ticket FROM bascule_datas
  WHERE  EXISTS (
    SELECT * FROM zone_collectes WHERE EXISTS (
      SELECT * FROM bareme_transports
       WHERE bareme_transports.origine_id=zone_collectes.id
        AND zone_collectes.zone=bascule_datas.origine));



https://www.itsolutionstuff.com/post/how-to-make-simple-dependent-dropdown-using-jquery-ajax-in-laravel-5example.html

http://novate.co.uk/dynamic-cascading-dropdown-with-livewire/


<style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /*height: 100vh;*/
                margin: 1em;
                
            }
            .selector-for-some-widget {
                box-sizing: content-box;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
               
            }

            .title {
                font-size: 84px;
               
            }

            .links > a {
                color: #636b6f;
                padding: 0 50px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
               
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>