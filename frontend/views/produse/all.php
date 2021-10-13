

<div class="row">
    <?php

    use app\models\Categorii;

    if(!Yii::$app->user->getIsGuest()){
        if(count($produse)> 0){
            foreach($produse as $produs){
                $link_produs = "";
                if(Yii::$app->user->can('admin-produse')){
                    $link_produs = '<a href="?r=produse/view&id='.$produs->id.'" class="btn btn-outline-primary">Vezi produs</a>';
                }else{
                    $link_produs = '<a href="#'.$produs->id.'" class="btn btn-outline-primary">Adauga in cos</a>';
                }
                echo '
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="images/'.$produs->produs_imagine.'" class="card-img-top img-resized" alt="...">
                        <div class="card-body">
                            <div class="product-data">
                                <div class="product-data_info">Denumire produs: </div>
                                <div class="product-data_value">'.$produs->produs_denumire.'</div>
                            </div>
                            <div class="product-data">
                                <div class="product-data_info">Categorie : </div>
                                <div class="product-data_value">'. Categorii::findOne($produs->produs_categorie)->categorie_denumire.'</div>
                            </div>
                            <div class="product-data">
                                <div class="product-data_info">Pret produs: </div>
                                <div class="product-data_value">'.$produs->produs_pret.'</div>
                            </div>
                            <div class="product-data">
                                <div class="product-data_info">Stock: </div>
                                <div class="product-data_value">'.$produs->produs_stock.'</div>
                            </div>
                            <div class="product-data_link">
                                '.$link_produs.'
                            </div>
                            
                        </div>
                    </div>
                </div>   
                ';
            }    
        }
    }else{
        echo '
            <div class="col-12 alert alert-danger" role="alert">Nu sunteti autentificat!</div>
            <div class="col-12" role="alert">
                <div class=user-info>
                    <img src="images/user.png">
                    <div>
                        Va puteti crea un cont 
                        <a href="?r=site%2Fsignup">aici!</a>
                    </div>
                </div>
                
            </div>
        ';
    }
        
    
    ?>
    
</div>

