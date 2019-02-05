<?php require 'header.php' ?>

    <div class="uk-container" style="margin-top: 6%;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div style="
    width: 73%;
">
        <h1 class="sub-title-h1">SaveMyExams</h1>
    	<p class="sub-title-p">Choose a subject and start exploring</p>
    </div>
    <div style="text-align: right;padding-top: 40px;display: flex;width:27%">
    <div>
    	<em class="back-btn" style="color: #999;">14 Subjects</em>
	</div>
	<div style="margin-left: 10px;">
		<a onclick="history.go(-1);">
			<em class="back-btn" style="color: #1e87f0;">← Back</em>
		</a>
	</div>
    </div>
    
    </div>
    <script>
        function support(cssName) {
            var htmlStyle = document.documentElement.style;
            if (cssName in htmlStyle)
                return true;
            return false;
        }
        
        if(!support('grid-template-columns')){ //判断浏览器是否支持 grid 属性
            $('#list')[0].className = 'sublist-1';
            $('#display_style')[0].innerHTML = '<style>.index-cate-card {width: 31.1%;margin-bottom: 2%;} .index-cate-card:nth-child(3n) {margin-left: 2%;}</style>';
        }
        
    </script>
    <div id="display_style"></div>
    <h1 style="font-weight: 600;text-align: center;width: 91.2%;background: #f1f2f3;padding: 10px;font-size: 2rem;color: #777;border-radius: 4px;margin-bottom: 20px !important;">IGCSE&nbsp;<em style="font-size:1.3rem;color:#777;font-style:normal;font-weight:200">(No Mark Schemes Provided)</em></h1>
    <div class="sublist" id="list">
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Physics</h3>
            <a href="/sme_paper?cate=igcse-physics-cie-2&sub=IGCSE Physics"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Chemistry</h3>
            <a href="/sme_paper?cate=igcse-chemistry-cie&sub=IGCSE Chemistry"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Maths(Extented)</h3>
            <a href="/sme_paper?cate=igcse-maths-cie&sub=IGCSE Mathematics(Extented)"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Maths(Core)</h3>
            <a href="/sme_paper?cate=cie-igcse-maths-core-free&sub=IGCSE Mathematics(Core)"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Biology</h3>
            <a href="/sme_paper?cate=igcse-biology-cie-2&sub=IGCSE Biology"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    </div>
    
    <h1 style="font-weight: 600;text-align: center;width: 91.2%;background: #f1f2f3;padding: 10px;font-size: 2rem;color: #777;border-radius: 4px;margin: 40px 0px 20px 0 !important;">A Levels&nbsp;<em style="font-size:1.3rem;color:#777;font-style:normal;font-weight:200">(No Mark Schemes Provided)</em></h1>
    <div class="sublist" id="list">
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Pure Mathematics 1</h3>
            <a href="/sme_paper?cate=ial-maths-cie-p1&sub=A Levels Maths-Pure1"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Pure Mathematics 2</h3>
            <a href="/sme_paper?cate=ial-maths-cie-p2&sub=A Levels Maths-Pure2"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Mechanics 1</h3>
            <a href="/sme_paper?cate=ial-maths-cie-m1&sub=A Levels Maths-Mechanics1"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Mechanics 2</h3>
            <a href="/sme_paper?cate=ial-maths-cie-m2&sub=A Levels Maths-Mechanics2"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Statistics 1</h3>
            <a><p class="item-guide">Currently Not Available</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Statistics 2</h3>
            <a href="/sme_paper?cate=ial-maths-cie-s2&sub=A Levels Statistics 2"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Chemistry</h3>
            <a href="/sme_paper?cate=ial-chemistry-cie&sub=A Levels Chemistry"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Biology</h3>
            <a href="/sme_paper?cate=cie-ial-biology&sub=A Levels Biology"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>
    
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3">Physics</h3>
            <a href="/sme_paper?cate=cie-ial-physics&sub=A Levels Physics"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
    </div>


    </div>
</div>
    </body>
</html>