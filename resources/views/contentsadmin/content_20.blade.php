@media screen and (max-width: 750px){
  table{
    border: 0;
  }
  table tr{
    margin-bottom: 10px;
    display: block;
    border-bottom: 2px solid #DDD;
  }
  table td{
    display: block;
    text-align: right;
    font-size: 16px;
    border-bottom: 1px dotted #CCC;
  }
  table td:last-child{
    border-bottom: 0;
  }
  table td:before{
    content: attr(data-label);
    float: left;
    text-transform: uppercase;
    font-weight: 600;
  }
  table thead{
    display: none;
  }
}
