# Theme-Content (Contao 4.4-Modul)

Hiermit werden im Contao-Backend für z.B. Footer oder Header-Inhaltselemente, nicht mehr wie sonst üblich Fake-Seitenbäume angelegt, sondern eine eigene Struktur geschaffen. 

### Meine Hoffung: 
Wenn alle Theme-Anbieter auf diese Struktur zurückgreifen würden, dann könnte man Demo und Themes installieren, ohne vorhandene Inhaltsstrukturen platt machen zu müssen.
Inhaltselemente werden weiterhin auch in der tl_content abgelegt. So kann wie gewohnt z.B. mit Inserttags {{insert_content::ID|ALIAS}} darauf zugegriffen werden und bei einem Import/Export kann gezielt nach ptable = 'tl_theme_section_article'  gefiltert werden.

Für Theme-Artikel wird der {{insert_theme_article::ID|ALIAS}} verwendet.
Für einzelne Conotent-Elemente aus dem Theme-Inhalte-Bereich kann sowohl {{insert_content::ID|ALIAS}} als auch {{insert_theme_content::ID|ALIAS}} verwendet werden.

Als Hook zum Überschreiben der Theme-Artikel-Ausgabe, kann $GLOBALS['TL_HOOKS']['compileThemeArticle'] wie bei $GLOBALS['TL_HOOKS']['compileArticle'] verwendet werden.

Diese werden durch 

* Theme-Inhalte
  * Bereiche ("tl_theme_section" wie Pages), 
  * Bereich-Artikel ("tl_theme_section_article" Baumstruktur nach Bereiche wie "Artikel" mit ptable "tl_theme_section")
    * Inhaltselemente ("tl_content" mit ptable "tl_theme_section_article")
    
verwaltet.


