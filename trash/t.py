import sys
import asyncio
from PyQt6.QtWidgets import (QApplication, QMainWindow, QWidget, QVBoxLayout, 
                             QHBoxLayout, QPushButton, QLineEdit, QLabel, 
                             QListWidget, QFrame, QStackedWidget)
from PyQt6.QtCore import Qt, QSize

# Discord-inspired color palette
DISCORD_DARK = "#2f3136"
DISCORD_SIDEBAR = "#202225"
DISCORD_BLURPLE = "#5865f2"
DISCORD_TEXT = "#dcddde"
DISCORD_RED = "#ed4245"

STYLE_SHEET = f"""
    QMainWindow {{ background-color: {DISCORD_DARK}; }}
    
    QFrame#Sidebar {{
        background-color: {DISCORD_SIDEBAR};
        border: none;
        min-width: 240px;
    }}
    
    QLabel {{ color: {DISCORD_TEXT}; font-family: 'Segoe UI', 'Ubuntu', sans-serif; }}
    
    QLineEdit {{
        background-color: #40444b;
        color: white;
        border: 1px solid #202225;
        border-radius: 4px;
        padding: 8px;
        margin-bottom: 10px;
    }}

    QPushButton {{
        background-color: {DISCORD_BLURPLE};
        color: white;
        border-radius: 5px;
        padding: 10px;
        font-weight: bold;
    }}
    
    QPushButton:hover {{ background-color: #4752c4; }}

    QListWidget {{
        background-color: transparent;
        border: none;
        color: {DISCORD_TEXT};
        outline: none;
    }}
    
    QListWidget::item {{
        padding: 10px;
        border-radius: 4px;
        margin: 2px;
    }}
    
    QListWidget::item:selected {{
        background-color: #393d43;
        color: white;
    }}
"""

class DiscordMonitor(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("Rust-ful Commander")
        self.resize(1000, 600)
        self.setStyleSheet(STYLE_SHEET)

        # Main Layout
        main_layout = QHBoxLayout()
        main_layout.setContentsMargins(0, 0, 0, 0)
        main_layout.setSpacing(0)

        # --- SIDEBAR ---
        sidebar = QFrame()
        sidebar.setObjectName("Sidebar")
        sidebar_layout = QVBoxLayout(sidebar)
        
        title = QLabel("WEBSITE MONITOR")
        title.setStyleSheet("font-weight: bold; font-size: 14px; margin-bottom: 10px;")
        
        self.site_list = QListWidget()
        
        sidebar_layout.addWidget(title)
        sidebar_layout.addWidget(self.site_list)
        
        # --- MAIN CONTENT AREA ---
        content_area = QWidget()
        self.content_layout = QVBoxLayout(content_area)
        self.content_layout.setContentsMargins(30, 30, 30, 30)

        # Header Info
        self.status_label = QLabel("Select a website to manage")
        self.status_label.setStyleSheet("font-size: 24px; font-weight: bold;")
        self.content_layout.addWidget(self.status_label)

        # Inputs for adding new sites
        self.name_input = QLineEdit(placeholderText="Website Name")
        self.url_input = QLineEdit(placeholderText="http://127.0.0.1:8080")
        add_btn = QPushButton("Register New Rust API")
        add_btn.clicked.connect(self.add_site)

        self.content_layout.addWidget(self.name_input)
        self.content_layout.addWidget(self.url_input)
        self.content_layout.addWidget(add_btn)
        self.content_layout.addStretch()

        # Action Buttons (Hidden until a site is selected)
        self.action_layout = QHBoxLayout()
        self.ban_btn = QPushButton("BAN SITE")
        self.ban_btn.setStyleSheet(f"background-color: {DISCORD_RED};")
        self.purge_btn = QPushButton("PURGE CACHE")
        self.purge_btn.setStyleSheet("background-color: #faa61a;") # Discord Orange
        
        self.action_layout.addWidget(self.ban_btn)
        self.action_layout.addWidget(self.purge_btn)
        self.content_layout.addLayout(self.action_layout)

        # Assemble
        main_layout.addWidget(sidebar)
        main_layout.addWidget(content_area)
        
        central_widget = QWidget()
        central_widget.setLayout(main_layout)
        self.setCentralWidget(central_widget)

    def add_site(self):
        name = self.name_input.text()
        url = self.url_input.text()
        if name and url:
            self.site_list.addItem(f"● {name}")
            self.name_input.clear()
            self.url_input.clear()

if __name__ == "__main__":
    app = QApplication(sys.argv)
    window = DiscordMonitor()
    window.show()
    sys.exit(app.exec())