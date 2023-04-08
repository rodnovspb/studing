<?php
function getParseMainResult($content) {

    $dom = phpQuery::newDocument($content);

    $wraper = $dom->find('div.catalog-list.js-catalog-list.clearfix');  
    $blocks = $wraper->find('div.item.item_table.clearfix');
    
    $report = '';
    foreach($blocks as $block) {

        $innerBlocksV1 = pq($block);  
        $innerBlocksV2 = $innerBlocksV1->find('h3.title.item-description-title');
        
        $linkBlock = $innerBlocksV2->find('a.item-description-title-link');
        $result['link'][] = $linkBlock->attr('href');
        $description = $linkBlock->children('span')->text();
        $result['description'][] = $description;
    }
  
    return $result;
}

function getParseInnerResult($content) {
    
    $pageDom = phpQuery::newDocument($content);
        
    $phone = $pageDom->find('._3vWKQ')->children('a')->attr('href');
    $phone = str_replace('tel:', '', $phone);
    if (preg_match('/^(\+\d{1})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches)) {
        $result['phone'] = $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . '-' . $matches[4] . '-' . $matches[5];
    }
    $result['price'] = $pageDom->find('.CdyRB._3SYIM._2jvRd')->children('span')->text();
    $result['sellerName'] = $pageDom->find('.MXmyi')->text();
    $result['sellerType'] = $pageDom->find('._2rm6l')->text();
    
    return $result;
}

/*
function getParseMainResult($content, $currenAnnounce) {

    $dom = phpQuery::newDocument($content);

    $blocks = $dom->find('._341z_');
    $report = '';
    
    foreach($blocks as $block) {
        
        $innerBlocksV1 = pq($block);        
        $innerBlocksV2 = $innerBlocksV1->find('._3B2-r');      
        $innerBlocksV3 = $innerBlocksV2->find('._328WR._2PXTe');
        
        foreach($innerBlocksV3 as $blockV3) {
            $innerBlockV4 = pq($blockV3); 
            $description = $innerBlockV4->find('._3zIC8._2cW1K')->children('div')->text();
            $result['link'][] = $innerBlockV4->find('a.MBUbs.eXo1j.e-2RA')->attr('href'); 
            $result['description'][] = $description;            
            $currenAnnounce++; 
            $report .= $currenAnnounce.') '.$description.'<br />'; 
        }     
        
    }
    
    $result['report'] = $report; 
    $result['currenAnnounce'] = $currenAnnounce;
    
    return $result;
}*/