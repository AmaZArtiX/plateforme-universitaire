$(function() {
  var wbbOpt = {
    buttons: "bold,italic,underline,|,link,bullist,|,quote,|,codec,codecpp,codejava,codephp,codepython,codesql",
    lang: "fr",
    allButtons: {
      codec: {
        title: 'Insérer du code C',
        buttonText: 'C',
        transform: {
          '<div><pre><code class="language-c">{SELTEXT}</code></pre></div>':'[codec]{SELTEXT}[/codec]'
        }
      },
      codecpp: {
        title: 'Insérer du code C++',
        buttonText: 'C++',
        transform: {
          '<div><pre><code class="language-cpp">{SELTEXT}</code></pre></div>':'[codecpp]{SELTEXT}[/codecpp]'
        }
      },
      codejava: {
        title: 'Insérer du code Java',
        buttonText: 'Java',
        transform: {
          '<div><pre><code class="language-java">{SELTEXT}</code></pre></div>':'[codejava]{SELTEXT}[/codejava]'
        }
      },
      codephp: {
        title: 'Insérer du code PHP',
        buttonText: 'PHP',
        transform: {
          '<div><pre><code class="language-php">{SELTEXT}</code></pre></div>':'[codephp]{SELTEXT}[/codephp]'
        }
      },
      codepython: {
        title: 'Insérer du code Python',
        buttonText: 'Python',
        transform: {
          '<div><pre><code class="language-python">{SELTEXT}</code></pre></div>':'[codepython]{SELTEXT}[/codepython]'
        }
      },
      codesql: {
        title: 'Insérer du code SQL',
        buttonText: 'SQL',
        transform: {
          '<div><pre><code class="language-sql">{SELTEXT}</code></pre></div>':'[codesql]{SELTEXT}[/codesql]'
        }
      }
    }
  }
  $("#editor").wysibb(wbbOpt);
})
