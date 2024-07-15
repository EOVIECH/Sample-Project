<?php
  require_once 'Controllers/CTypeOfProducts.PHP';
  require_once 'Controllers/CProducts.PHP';
  require_once 'Controllers/CCustomers.PHP';
  require_once 'Models/MTypeOfProducts.PHP';
  $cTOP = new CTypeOfProducts();
  $cPro = new CProducts();
  $cCus = new CCustomers();
  $options = isset($_GET['act']) ? $_GET['act'] : '/';
  switch($options)
  {
    case 'Home':
    {
        $cTOP -> Home();
        break;
    }
    case 'TypeOfProductsAdmin':
    {
        $cTOP -> TypeOfProducts();
        break;
    }

    case 'ListTypeOfProductsAdmin':
    {
        $cTOP -> ListTypeOfProducts();
        break;
    }

    case 'DeleteDataSelectedTOP':
      {
          $cTOP -> DeleteDataSelected();
          break;
      }

    case 'DeleteDataTOP':
      {
          $cTOP -> DeleteData();
          break;
      }
    case 'UpdateDataTOP':
      {
          $cTOP -> UpdateData();
          break;
      }
    case 'Products':
      {
          $cPro -> Products();
          break;
      }
    case 'ListProducts':
      {
          $cPro -> ListProducts();
          break;
      }
    case 'UpdateProducts':
      {
          $cPro -> UpdateData();
          break;
      }
    case 'DeleteDataSelectedPro':
      {
          $cPro -> DeleteDataSelected();
          break;
      }
    case 'DeleteDataPro':
      {
          $cPro -> DeleteData();
          break;
      }
    case 'Customers':
      {
          $cCus -> Customers();
          break;
      }
    case 'ListCustomers':
      {
          $cCus -> ListCustomers();
          break;
      }
    case 'UpdateCustomers':
      {
          $cCus -> UpdateCustomers();
          break;
      }
    case 'DeleteDataCus':
      {
          $cCus -> DeleteData();
          break;
      }
    case 'DeleteDataSelectedCus':
      {
          $cCus -> DeleteDataSelected();
          break;
      }
  }
?>

<script>
    function selectAll()
    {
      let checkboxes = document.querySelectorAll('.checkbox');
      checkboxes.forEach(function(checkbox)
      {
        checkbox.checked = true;
      });
    }

    function deselectAll()
    {
      let checkboxes = document.querySelectorAll('.checkbox');
      checkboxes.forEach(function(checkbox)
      {
        checkbox.checked = false;
      });
    }

    function confirmDeleted(delURL)
    {
      if(confirm('ARE YOU SURE DELETE SELECTED DATA'))
      {
        document.location = delURL;
        console.log(delURL);
      }
    }

</script>