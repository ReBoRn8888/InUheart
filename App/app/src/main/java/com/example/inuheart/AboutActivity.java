package com.example.inuheart;

import android.app.Activity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

/**
 * Created by Reborn on 2017/7/28.
 */

public class AboutActivity extends Activity{
    private ImageButton back;
    private TextView toolbar_title;
    private Toolbar boolBar;
    private ImageView icon;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.about);

        boolBar = (Toolbar)findViewById(R.id.toolbar);
        toolbar_title = (TextView) boolBar.findViewById(R.id.toolbar_title);
        back = (ImageButton) findViewById(R.id.back);
        icon = (ImageView)findViewById(R.id.icon);

        toolbar_title.setText("关于我们");
        icon.setImageResource(R.drawable.inuheart);

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }
}
