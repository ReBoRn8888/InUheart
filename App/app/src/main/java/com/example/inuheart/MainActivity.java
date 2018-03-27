package com.example.inuheart;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.widget.Toolbar;
import android.widget.ImageButton;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.inuheart.util.PagerSlidingTabStrip;
import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private PagerSlidingTabStrip tabs;
    private ViewPager pager;
    private TextView toolbar_title,username;
    private DrawerLayout mDrawerLayout;
    private ActionBarDrawerToggle mDrawerToggle;
    private ImageButton portrait;
    private Bundle b;
    private Intent intent;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    private String user;
    private LinearLayout appointment,settings,about;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sharedPreferences= getSharedPreferences("test",
                Activity.MODE_PRIVATE);
        editor = sharedPreferences.edit();
        String userid = sharedPreferences.getString("userid", "");

        portrait = (ImageButton) findViewById(R.id.portrait);
        appointment = (LinearLayout) findViewById(R.id.appointment);
        settings = (LinearLayout) findViewById(R.id.settings);
        about = (LinearLayout) findViewById(R.id.about);
        username = (TextView) findViewById(R.id.username);
        mDrawerLayout = (DrawerLayout)findViewById(R.id.drawerLayout);
        tabs = (PagerSlidingTabStrip) findViewById(R.id.tabs);
        pager = (ViewPager) findViewById(R.id.pager);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar_title = (TextView) toolbar.findViewById(R.id.toolbar_title);

        toolbar_title.setText("InUheart");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayShowTitleEnabled(false);
        getSupportActionBar().setHomeButtonEnabled(true);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        mDrawerToggle = new ActionBarDrawerToggle(this, mDrawerLayout, toolbar,R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        mDrawerToggle.syncState();
        mDrawerLayout.setDrawerListener(mDrawerToggle);
        MyPagerAdapter adapter = new MyPagerAdapter(getSupportFragmentManager());
        pager.setAdapter(adapter);
        tabs.setViewPager(pager);
        setTabValue();
        if(!userid.isEmpty())
            portrait.setClickable(false);
        else
            portrait.setClickable(true);

        user = sharedPreferences.getString("name","");
        if(!user.isEmpty()){
            username.setText(user);
            portrait.setClickable(false);
        }

        portrait.setOnClickListener(this);
        appointment.setOnClickListener(this);
        settings.setOnClickListener(this);
        about.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch(v.getId())
        {
            case R.id.portrait:
                if(sharedPreferences.getString("name", "").isEmpty())
                {
                    Toast.makeText(MainActivity.this, "登录", Toast.LENGTH_SHORT).show();
                    intent = new Intent(MainActivity.this, LoginActivity.class);
                    startActivityForResult(intent, 100);
                }
                break;
            case R.id.appointment:
                if(sharedPreferences.getString("name","").isEmpty())
                    Toast.makeText(MainActivity.this, "请先登录~", Toast.LENGTH_SHORT).show();
                else{
                    Toast.makeText(MainActivity.this, "我的预约", Toast.LENGTH_SHORT).show();
                    intent = new Intent(MainActivity.this, MineActivity.class);
                    startActivity(intent);
                }
                break;
            case R.id.settings:
                if(sharedPreferences.getString("name", "").equals(""))
                    Toast.makeText(MainActivity.this, "请先登录~", Toast.LENGTH_SHORT).show();
                else
                {
                    Toast.makeText(MainActivity.this, "用户设置", Toast.LENGTH_SHORT).show();
                    intent = new Intent(MainActivity.this, SettingsActivity.class);
                    startActivityForResult(intent, 101);
                }
                break;
            case R.id.about:
                intent = new Intent(MainActivity.this, AboutActivity.class);
                startActivity(intent);
                break;
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        String usrname;
        switch(resultCode)
        {
            case 100:
                usrname = data.getExtras().getString("name");
                username.setText(usrname);
				portrait.setClickable(false);
                settings.setClickable(true);
                break;
            case 101:
                usrname = data.getExtras().getString("name");
                username.setText(usrname);
				portrait.setClickable(true);
                break;
            default:
                break;
        }
    }

    @Override
    protected void onDestroy() {
        // TODO Auto-generated method stub
        editor.clear();
        editor.commit();
        super.onDestroy();
    }

    public class MyPagerAdapter extends FragmentPagerAdapter {
        private final String[] TITLES = { "预约咨询", "心理测评", "在线聊天"};
        List<MyFragment> fragments = new ArrayList<MyFragment>();
        public MyPagerAdapter(FragmentManager fm) {
            super(fm);
            for(String title:TITLES){
                MyFragment fragment = new MyFragment();
                Bundle args =new Bundle();
                args.putString("param", title);
                fragment.setArguments(args);
                fragments.add(fragment);
            }
        }
        @Override
        public CharSequence getPageTitle(int position) {
            return TITLES[position];
        }
        @Override
        public int getCount() {
            return TITLES.length;
        }
        @Override
        public Fragment getItem(int position) {
            return fragments.get(position);
        }
    }

    public void setTabValue(){
        tabs.setSelectedTextColor(getResources().getColor(R.color.tab_text_color_selected));
    }

}
