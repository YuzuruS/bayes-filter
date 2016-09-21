<?php
require_once 'vendor/autoload.php';
require_once 'MecabTokenizer.php';

use Fieg\Bayes\Classifier;

// 単語分類器と分類器の生成
$tokenizer = new MecabTokenizer();
$classifier = new Classifier($tokenizer);

// 学習
$classifier->train('迷惑メール', '年収1000万を確実に稼ぐ方法');
$classifier->train('迷惑メール', '【FX】1年で資産120倍！このスゴイ講義が無料。ちょっと信じられません・・・');
$classifier->train('迷惑メール', '月利40%のモニター募集');
$classifier->train('迷惑メール', '【年利174%】99.9%の確率で含み損が利益になるプロ技');
$classifier->train('迷惑メール', '【2日で1億1800万円】英国EU離脱騒動で稼いだオトコの正体');
$classifier->train('迷惑メールでない', '暮らしを便利にするマストアイテムを65％OFF');
$classifier->train('迷惑メールでない', 'アンケートにご回答いただくと30ポイントプレゼント【楽天】（2016/09/17）');
$classifier->train('迷惑メールでない', '【お急ぎください！】9月連休出発高速バス予約ラストチャンス！');
$classifier->train('迷惑メールでない', 'Amazon.co.jpからポイント付与についてお知らせ');
$classifier->train('迷惑メールでない', '【住信SBIネット銀行】定額自動振込サービス振込受付のお知らせ	');

$s = '【衝撃映像】『日給1100万円確定』の瞬間を捉えた！';
$r1 = $classifier->classify($s);
echo "--- $s\n";
print_r($r1);

$s = '【早割】特大和洋中おせち♪国産南高梅の木箱ギフトなど【楽天】（2016/09/18）';
$r2 = $classifier->classify($s);
echo "--- $s\n";
print_r($r2);
